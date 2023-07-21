<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class ReturnController extends Controller
{
    public function returnRequest(){
        $orders = Order::where('return_order',1)->orderBy('id','DESC')->get();
        return view('backend.return_order.return_request',compact('orders'));
    }//end method

    public function returnRequestApproved($order_id){
        Order::where('id',$order_id)->update(['return_order' => 2]);

        $notification = array(
            'message' => 'Return Order Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }//end method

    public function returnAllRequest(){
        $orders = Order::where('return_order',2)->orderBy('id','DESC')->get();
        return view('backend.return_order.return_all_request',compact('orders'));
    }
}
