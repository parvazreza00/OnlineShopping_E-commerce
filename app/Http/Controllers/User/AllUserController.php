<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Mail\OrderMail;
use Barryvdh\DomPDF\Facade\PDF;

class AllUserController extends Controller
{
    public function myOrders(){
        $orders = Order::where('user_id',Auth::id())->orderBy('id','DESC')->get();
        return view('frontend.user.order.order_view',compact('orders'));
    }//

    public function orderDetails($order_id){
        $order = Order::with('division','district','state','user')->where('id',$order_id)->where('user_id',Auth::id())->first();
        $orderItem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();
        return view('frontend.user.order.order_details',compact('order','orderItem'));

    }//end method

    //order invoice download by user
    public function invoiceDownload($order_id){
        $order = Order::with('division','district','state','user')->where('id',$order_id)->where('user_id',Auth::id())->first();
        $orderItem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();
        // return view('frontend.user.order.order_invoice',compact('order','orderItem'));

        $pdf = PDF::loadView('frontend.user.order.order_invoice', compact('order','orderItem'))->setPaper('a4')->setOptions([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);
        return $pdf->download('invoice.pdf');
    }//end method

    //return reason
    public function returnOrder(Request $request, $order_id){
        Order::findOrFail($order_id)->update([
            'return_date' => Carbon::now()->format('d F Y'),
            'return_reason' => $request->return_reason,
            'return_order' => 1,
        ]);

        $notification = array(
            'message' => 'Your Return Request Sent Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('my.orders')->with($notification);
    }//end method

    public function returnOrderList(){
        $orders = Order::where('user_id',Auth::id())->where('return_reason','!=',NULL)->orderBy('id','DESC')->get();
        return view('frontend.user.order.return_order_view',compact('orders'));
    }//end method

    public function cancelOrderList(){
        $orders = Order::where('user_id',Auth::id())->where('status','cancel')->orderBy('id','DESC')->get();
        return view('frontend.user.order.cancel_order_view',compact('orders'));
    }//end method

    //order tracking method
    public function orderTracking(Request $request){
        $invoice = $request->code;
        $track = Order::where('invoice_no',$invoice)->first();

        if($track){
            // echo "<pre>";
            // print_r($tracking);

            return view('frontend.tracking.track_order',compact('track'));

        }else{
            $notification = array(
                'message' => 'Your Invoice Number did not Match!',
                'alert-type' => 'error',
            );
            return redirect()->back()->with($notification);
        }

    }


}
