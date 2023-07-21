<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;
use Carbon\Carbon;

class CouponController extends Controller
{
    public function couponView(){
        $coupons = Coupon::orderBy('id','DESC')->get();
        return view('backend.coupon.coupon_view',compact('coupons'));
    }//end method

    public function couponStore(Request $request){
        $request->validate([
            'coupon_name' => 'required',
            'coupon_discount' => 'required',            
            'coupon_validity' => 'required',          
        ]);       

        Coupon::insert([
            'coupon_name' => strtoupper($request->coupon_name),
            'coupon_discount' => $request->coupon_discount,           
            'coupon_validity' => $request->coupon_validity,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Coupon inserted successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }//end method

    //coupon edit view page
    public function couponEdit($id){
        $couponEdit = Coupon::findOrFail($id);
        return view('backend.coupon.coupon_edit',compact('couponEdit'));
    }//end method

    //coupon update 
    public function updateCoupon(Request $request, $id){
        Coupon::findOrFail($id)->update([
            'coupon_name' => strtoupper($request->coupon_name),
            'coupon_discount' => $request->coupon_discount,           
            'coupon_validity' => $request->coupon_validity,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Coupon Update Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('manage-coupon')->with($notification);
    }//end method

    //delete coupon
    public function couponDelete($id){
        Coupon::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Coupon Deleted successfully',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }//end method
}
