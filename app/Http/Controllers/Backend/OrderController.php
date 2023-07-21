<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\PDF;


class OrderController extends Controller
{
    //pendign order list
    public function pendingOrder(){
        $orders = Order::where('status','pending')->orderBy('id','DESC')->get();
        return view('backend.order.pending_order',compact('orders'));
    }//end method;

    //pending order details
    public function pendingOrderDetails($order_id){
        $order = Order::with('division','district','state','user')->where('id',$order_id)->first();
        $orderItem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();
        return view('backend.order.pending_order_details',compact('order','orderItem'));
    }//end method

    //confirm order list
    public function confirmOrder(){
        $orders = Order::where('status','confirm')->orderBy('id','DESC')->get();
        return view('backend.order.confirm_order',compact('orders'));
    }//end method

    //processing order list
    public function processingOrder(){
        $orders = Order::where('status','processing')->orderBy('id','DESC')->get();
        return view('backend.order.processing_order',compact('orders'));
    }//end method

    //picked order list
    public function pickedOrder(){
        $orders = Order::where('status','picked')->orderBy('id','DESC')->get();
        return view('backend.order.picked_order',compact('orders'));
    }//end method

    //shipped order list
    public function shippedOrder(){
        $orders = Order::where('status','shipped')->orderBy('id','DESC')->get();
        return view('backend.order.shipped_order',compact('orders'));
    }//end method

    //delivered order list
    public function deliveredOrder(){
        $orders = Order::where('status','delivered')->orderBy('id','DESC')->get();
        return view('backend.order.delivered_order',compact('orders'));
    }//end method

    //cancel order list
    public function cancelOrder(){
        $orders = Order::where('status','cancel')->orderBy('id','DESC')->get();
        return view('backend.order.cancel_order',compact('orders'));
    }//end method

    //update status to pending to confirm
    public function pendingToConfirm($order_id){
        Order::findOrFail($order_id)->update(['status' => 'confirm']);

        $notification = array(
            'message' => 'Order Confirm Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('pending-orders')->with($notification);
    }

    //update status confirm to processing
    public function confirmToProcessing($order_id){
        Order::findOrFail($order_id)->update(['status' => 'processing']);

        $notification = array(
            'message' => 'Order Processing Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('confirm-orders')->with($notification);
    }

    //update status processing to picked
    public function ProcessingToPicked($order_id){
        Order::findOrFail($order_id)->update(['status' => 'picked']);

        $notification = array(
            'message' => 'Order Picked Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('processing-orders')->with($notification);
    }

    //update status picked to shipped
    public function pickedToShipped($order_id){
        Order::findOrFail($order_id)->update(['status' => 'shipped']);

        $notification = array(
            'message' => 'Order Shipped Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('picked-orders')->with($notification);
    }

    //update status shipped to delivered
    public function shippedToDelivered($order_id){

        $product = OrderItem::where('order_id',$order_id)->get();
        foreach($product as $item){
            Product::where('id',$item->product_id)
            ->update(['product_qty' => DB::raw('product_qty-'.$item->qty)]);
        }

        Order::findOrFail($order_id)->update(['status' => 'delivered']);

        $notification = array(
            'message' => 'Order Delivered Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('shipped-orders')->with($notification);
    }

    //update status Cancel order
    public function cancelToOrder($order_id){
        Order::findOrFail($order_id)->update(['status' => 'cancel']);

        $notification = array(
            'message' => 'Order Cancel Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('delivered-orders')->with($notification);
    }

    //order invoice download by Admin
    public function AdminInvoiceDownload($order_id){
        $order = Order::with('division','district','state','user')->where('id',$order_id)->first();
        $orderItem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();
        // return view('frontend.user.order.order_invoice',compact('order','orderItem'));

        $pdf = PDF::loadView('backend.order.order_invoice', compact('order','orderItem'))->setPaper('a4')->setOptions([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);
        return $pdf->download('invoice.pdf');
    }
}
