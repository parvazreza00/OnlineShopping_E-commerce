<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WishList;
use Auth;
use Carbon\Carbon;

class WishListController extends Controller
{
    public function viewWishlist(){
        return view('frontend.wishlist.view_wishlist');
    }

    public function getWishlistProduct(){
        $wishlist = WishList::with('product')->where('user_id',Auth::id())->latest()->get();
        return response()->json($wishlist);
    }//end method

    public function removeWishlistProduct($id){
        WishList::where('user_id',Auth::id())->where('id',$id)->delete();
        return response()->json(['success' => 'Product Remove Successfully!!']);
    }
}
