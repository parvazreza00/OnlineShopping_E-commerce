<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\WishList;
use App\Models\Coupon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

use App\Models\ShipDivision;
use App\Models\ShipDistrict;

class CartController extends Controller
{
    public function addToCart(Request $request, $id){

        if(Session::has('coupon')){
            Session::forget('coupon');
        }

        $product = Product::findOrFail($id);

        if($product->discount_prize == NULL){
            Cart::add([
                'id' => $id, 
                'name' => $request->product_name, 
                'qty' => $request->qty, 
                'price' => $product->selling_prize, 
                'weight' => 1, 
                'options' => [
                    'image' => $product->product_thumbnail,
                    'color' => $request->color,
                    'size' => $request->size,
                ],
        ]);
        return response()->json(['success' => 'Successfully Added on Your Cart']);

        }else{
            Cart::add([
                'id' => $id, 
                'name' => $request->product_name, 
                'qty' => $request->qty, 
                'price' => $product->discount_prize, 
                'weight' => 1, 
                'options' => [
                    'image' => $product->product_thumbnail,
                    'color' => $request->color,
                    'size' => $request->size,
                ],
        ]);
        return response()->json(['success' => 'Successfully Added on Your Cart']);

        }
    }//end method;

    // mini cart section
    public function addToMiniCart(){
        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();

        return response()->json(array(
            'carts' => $carts,
            'cartsQty' => $cartQty,
            'cartTotal' => round($cartTotal),
        ));

    }//end method

    public function removeMiniCart($rowId){
        Cart::remove($rowId);
        return response()->json(['success' => 'Product Remove From Card']);
    }//end method

    // add to wishlist method
    public function addToWishlist(Request $request, $product_id){
        if(Auth::check()){
            $exists= WishList::where('user_id',Auth::id())->where('product_id',$product_id)->first();
            
            if(!$exists){
                    WishList::insert([
                    'user_id' => Auth::id(),
                    'product_id' => $product_id,
                    'created_at' => Carbon::now(),
                ]);
                return response()->json(['success' => 'Your Wishlist is Added Successfully!!!']);

            }else{
                return response()->json(['error' => 'This product has already  your Whishlist!!!']);
            }
            

        }else{
            return response()->json(['error' => 'At First Login Your Account!!!']);
        }
    }//end method


    public function couponApply(Request $request){
        $coupon = Coupon::where('coupon_name',$request->coupon_name)->where('coupon_validity','>=',Carbon::now()->format('Y-m-d'))->first();
        if($coupon){
            Session::put('coupon', [
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => round(Cart::total() * $coupon->coupon_discount/100), 
                'total_amount' => round(Cart::total() - Cart::total() * $coupon->coupon_discount/100),
            ]);
            return response()->json(array(
                'validity' => true,
                'success' => "Coupon Applied Successfully",
            ));
        }else{
            return response()->json(['error' => 'Invalid Coupon Name']);
        }
    }//end method

    //coupon calculation
    public function couponCalculation(){
        if(Session::has('coupon')){
            return response()->json(array(
                'subTotal' => Cart::total(),
                'coupon_name' => session()->get('coupon')['coupon_name'],
                'coupon_discount' => session()->get('coupon')['coupon_discount'],
                'discount_amount' => session()->get('coupon')['discount_amount'],
                'total_amount' => session()->get('coupon')['total_amount'],
            ));

        }else{
            return response()->json(array(
                'total' => Cart::total(),
            ));
        }
    }//end method

    public function couponRemove(){
        Session::forget('coupon');
        return response()->json(['success' => 'coupon remove successfully']);
    }

    //checkout method
    public function checkoutCreate(){
        if(Auth::check()){
            if(Cart::total() > 0){

                $carts = Cart::content();
                $cartQty = Cart::count();
                $cartTotal = Cart::total();

        $division = ShipDivision::orderBy('division_name','ASC')->get();
        $district = ShipDistrict::orderBy('district_name','ASC')->get();
        $state = ShipDistrict::orderBy('district_name','ASC')->get();

                return view('frontend.checkout.checkout_view',compact('carts','cartQty','cartTotal','division','district','state'));

            }else{
                $notification = array(
                    'message' => "pls, Shopping at least one product",
                    'alert-type' => 'info',
                );
                return redirect()->to('/')->with($notification);
            }

        }else{
            $notification = array(
                'message' => "You Need to Login First",
                'alert-type' => 'error',
            );
            return redirect()->route('login')->with($notification);
        }
    }
}
