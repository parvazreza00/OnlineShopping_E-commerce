<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ReviewController extends Controller
{
    public function reviewStore(Request $request,$product_id){
        $product = $request->product_id;

        $request->validate([
            'summery' => 'required',
            'comments' => 'required',            
                      
        ],[
            'summery.required' => 'Please, Write your summery about Product',
            'comments.required' => 'Please, Write your comments about Product',
        ]); 
        
        Review::insert([
            'product_id' => $product,
            'user_id' => Auth::id(),
            'comments' => $request->comments,
            'summery' => $request->summery,
            'rating' => $request->quality,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Review will approve by Admin',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);

    }//end method

    public function pendingReview(){
        $review = Review::with('user','product')->where('status',0)->orderBy('id','DESC')->get();
        return view('backend.review.pending_review',compact('review'));
    }//end method

    public function reviewApproved($id){
        Review::where('id',$id)->update(['status' => 1]);

        $notification = array(
            'message' => 'User Review Approved Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }//end method

    public function publishApproved(){
        $review = Review::with('user','product')->where('status',1)->orderBy('id','DESC')->get();
        return view('backend.review.publish_review',compact('review'));
    }//end method 

    public function deleteReview($id){
        Review::findOrFail($id)->delete();

        $notification = array(
            'message' => 'User Review Delete Successfully',
            'alert-type' => 'error',
        );
        return redirect()->back()->with($notification);
    }//end method 
}
