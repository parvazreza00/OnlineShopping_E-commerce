<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\SubSubCategory;
use App\Models\Product;
use App\Models\MultiImg;
use App\Models\Slider;
use App\Models\Brand;
use App\Models\Blog\BlogPost;

class IndexController extends Controller
{
    public function index(){
    
    $blogPost = BlogPost::latest()->get();
    $products = Product::where('status',1)->orderBy('id','DESC')->limit(6)->get();
    $sliders = Slider::where('status',1)->orderBy('id','DESC')->limit(3)->get();
    $categories = Category::orderBy('category_name_en','ASC')->get();

    $featured = Product::where('featured',1)->orderBy('id','DESC')->limit(6)->get();
    $hot_deals = Product::where('hot_deals',1)->where('discount_prize','!=',NULL)->orderBy('id','DESC')->limit(3)->get();
    $special_offer = Product::where('special_offer',1)->orderBy('id','DESC')->limit(12)->get();
    $special_deals = Product::where('special_deals',1)->orderBy('id','DESC')->limit(12)->get();

    $skip_category_0 = Category::skip(0)->first();
    $skip_product_0 = Product::where('status',1)->where('category_id',$skip_category_0->id)->orderBy('id','DESC')->get();

    $skip_category_3 = Category::skip(3)->first();
    $skip_product_3 = Product::where('status',1)->where('category_id',$skip_category_3->id)->orderBy('id','DESC')->get();

    $skip_brand_0 = Brand::skip(0)->first();
    $skip_brand_product_0 = Product::where('status',1)->where('brand_id',$skip_brand_0->id)->orderBy('id','DESC')->get();

    return view('frontend.index', compact('categories','sliders','products','featured','hot_deals','special_offer','special_deals','skip_category_0','skip_product_0','skip_category_3','skip_product_3','skip_brand_0','skip_brand_product_0','blogPost'));
    }

    public function userLogout(){
        Auth::logout();
        return redirect()->route('login');
    }

    public function userProfile(){
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.profile.user_profile', compact('user'));
    }

    public function userProfileStore(Request $request){
        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;

        if($request->file('profile_photo_path')){
            $file = $request->file('profile_photo_path');
            @unlink(public_path('upload/user_images/'.$data->profile_photo_path));
            $fileName = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_images'),$fileName);
            $data['profile_photo_path'] = $fileName;
        }
        $data->save();
        $notification = array(
            'message' => 'User Profile updated successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('dashboard')->with($notification);
    }

    public function changePassword(){
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.profile.change_password', compact('user'));
    }

    public function userPasswordUpdate(Request $request){
        $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hashpassword = Auth::user()->password;
        if(Hash::check($request->oldpassword,$hashpassword)){
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('user.logout');
        }else{
            return redirect()->back();
        }

    }

    public function productDetails($id,$slug){
        $product = Product::findOrFail($id);

        $color_en = $product->product_color_en;
        $product_color_en = explode(',',$color_en);

        $color_hin = $product->product_color_hin;
        $product_color_hin = explode(',',$color_hin);

        $size_en = $product->product_size_en;
        $product_size_en = explode(',',$size_en);

        $size_hin = $product->product_size_hin;
        $product_size_hin = explode(',',$size_hin);

        $multiImg = MultiImg::where('product_id',$id)->get();

        $category_id = $product->category_id;
        $relatedProduct = Product::where('category_id',$category_id)->where('id','!=',$id)->orderBy('id','DESC')->get();
        
        return view('frontend.product.product_details', compact('product','multiImg','product_color_en','product_color_hin','product_size_en','product_size_hin','relatedProduct'));
    }


    public function tagWiseProduct($tag){
        $products = Product::where('status',1)->where('product_tags_en',$tag)->where('product_tags_hin',$tag)->orderBy('id','DESC')->paginate(3);
        
        $categories = Category::orderBy('category_name_en','ASC')->get();
        return view('frontend.tags.tags_view',compact('products','categories'));
    }

    // subcategory wise data
    public function subcategoryWiseProduct(Request $request, $subcategory_id,$slug){
        $products = Product::where('status',1)->where('subcategory_id',$subcategory_id)->orderBy('id','DESC')->paginate(3);
        
        $categories = Category::orderBy('category_name_en','ASC')->get();
        $breadsubcat = Subcategory::where('id',$subcategory_id)->get();

///  Load More Product with Ajax 
if ($request->ajax()) {
    $grid_view = view('frontend.product.grid_view_product',compact('products'))->render();
 
    $list_view = view('frontend.product.list_view_product',compact('products'))->render();
     return response()->json(['grid_view' => $grid_view,'list_view',$list_view]);	
 
         }
         ///  End Load More Product with Ajax 

        return view('frontend.product.subcategory_view',compact('products','categories','breadsubcat'));
    }

    // subsubcategory wise data
    public function subsubcategoryWiseProduct($subsubcategory_id,$slug){
        $products = Product::where('status',1)->where('subsubcategory_id',$subsubcategory_id)->orderBy('id','DESC')->paginate(6);
        
        $categories = Category::orderBy('category_name_en','ASC')->get();
        $breadsubsubcat = SubSubcategory::where('id',$subsubcategory_id)->get();
        return view('frontend.product.sub_subcategory_view',compact('products','categories','breadsubsubcat'));
    }

    //product view with ajax
    public function productViewAjax($id){
        $product = Product::with('category','brand')->findOrFail($id);

        $color = $product->product_color_en;
        $product_color = explode(',',$color);

        $size = $product->product_size_en;
        $product_size = explode(',',$size);

        return response()->json(array(
            'product' => $product,
            'color' => $product_color,
            'size' => $product_size,
        ));
    }//end method


    public function productSearch(Request $request){

        $request->validate(['search' => 'required']);
        $item = $request->search;
        // echo $item;

        $categories = Category::orderBy('category_name_en','ASC')->get();
		$products = Product::where('product_name_en','LIKE',"%$item%")->get();
		return view('frontend.product.search',compact('products','categories'));
    }//end method

    public function advancedProductSearch(Request $request){
    
        $request->validate(['search' => 'required']);
        $item = $request->search;        

        
		$products = Product::where('product_name_en','LIKE',"%$item%")->select('product_name_en','product_thumbnail','selling_prize','product_slug_en','id')->limit(5)->get();
		return view('frontend.product.search_product',compact('products'));
    
    }
}
