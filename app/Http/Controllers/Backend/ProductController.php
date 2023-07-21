<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Brand;
use App\Models\Product;
use App\Models\MultiImg;
use Carbon\Carbon;
use Image;

class ProductController extends Controller
{
    public function addProduct(){
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        return view('backend.product.product_add',compact('categories','brands'));
    }

    public function storeProduct(Request $request){

        $request->validate([
            'file' => 'required|mimes:jpeg,jpg,png,zip,pdf,xlx,csv|max:2048',
        ]);

    if($files = $request->file('file')){
    $destinationPath = 'upload/Pdf';//upload file path;
    $digitalfile = date('YmdHis').".".$files->getClientOriginalExtension();
    $files->move($destinationPath,$digitalfile);

        }

        $image = $request->file('product_thumbnail');
        $image_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(917, 1000)->save('upload/products/thambnail/'.$image_gen);
        $save_url = 'upload/products/thambnail/'.$image_gen;

        $product_id = Product::insertGetId([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,	
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_name_en' => $request->product_name_en,
            'product_name_hin' => $request->product_name_hin,
            'product_slug_en' => strtolower(str_ireplace(' ', '-',$request->product_name_en )),
            'product_slug_hin' => str_ireplace(' ', '-',$request->product_name_hin ),
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_tags_en' => $request->product_tags_en,
            'product_tags_hin' => $request->product_tags_hin,
            'product_size_en' => $request->product_size_en,
            'product_size_hin' => $request->product_size_hin,
            'product_color_en' => $request->product_color_en,
            'product_color_hin' => $request->product_color_hin,
            'selling_prize' => $request->selling_prize,
            'discount_prize' => $request->discount_prize,	
            'short_desc_en' => $request->short_desc_en,
            'short_desc_hin' => $request->short_desc_hin,
            'long_desc_en' => $request->long_desc_en,
            'long_desc_hin' => $request->long_desc_hin,
            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,

            'product_thumbnail' => $save_url,
            'digital_file' => $digitalfile,
            'status' => 1,
            'created_at' => Carbon::now(),
            
        ]);

        // start multi-images 
        $multi_images = $request->file('multi_img');
        foreach($multi_images as $multi_image){
            $image_make_name = hexdec(uniqid()).'.'.$multi_image->getClientOriginalExtension();
            Image::make($multi_image)->resize(917, 1000)->save('upload/products/multi_img/'.$image_make_name);
            $uploadPath = 'upload/products/multi_img/'.$image_make_name;

            MultiImg::insert([
                'product_id' => $product_id,
                'photo_name' => $uploadPath,
                'created_at' => Carbon::now(),
            ]);
        }
        // end multi-images 
        $notification = array(
            'message' => 'Blog Post inserted successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('manage.product')->with($notification);
    }

    public function manageProduct(){
        $products = Product::latest()->get();
        return view('backend.product.product_view', compact('products'));
    }

    public function editProduct($id){

        $multipleImgs = MultiImg::where('product_id',$id)->get();

        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();
        $subcategory = SubCategory::latest()->get();
        $SubSubcategory = SubSubCategory::latest()->get();        
        $products = Product::findOrFail($id);
        return view('backend.product.product_edit',compact('brands','categories','subcategory','SubSubcategory','products','multipleImgs'));
    }

    public function updateDataProduct(Request $request){
        $product_id = $request->id;

        Product::findOrFail($product_id)->update([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,	
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_name_en' => $request->product_name_en,
            'product_name_hin' => $request->product_name_hin,
            'product_slug_en' => strtolower(str_ireplace(' ', '-',$request->product_name_en )),
            'product_slug_hin' => str_ireplace(' ', '-',$request->product_name_hin ),
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_tags_en' => $request->product_tags_en,
            'product_tags_hin' => $request->product_tags_hin,
            'product_size_en' => $request->product_size_en,
            'product_size_hin' => $request->product_size_hin,
            'product_color_en' => $request->product_color_en,
            'product_color_hin' => $request->product_color_hin,
            'selling_prize' => $request->selling_prize,
            'discount_prize' => $request->discount_prize,	
            'short_desc_en' => $request->short_desc_en,
            'short_desc_hin' => $request->short_desc_hin,
            'long_desc_en' => $request->long_desc_en,
            'long_desc_hin' => $request->long_desc_hin,
            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,            
            'status' => 1,
            'updated_at' => Carbon::now(),            
        ]);

        $notification = array(
            'message' => 'Product Updated Without Image',
            'alert-type' => 'success'
        );
        return redirect()->route('manage.product')->with($notification);
    }

    
    public function deleteDataProduct($id){
        $product_Thumbnail = Product::findOrFail($id);
        unlink($product_Thumbnail->product_thumbnail);
        Product::findOrFail($id)->delete();

        $multi_img = MultiImg::where('product_id',$id)->get();
        foreach($multi_img as $img){
            unlink($img->photo_name);
            MultiImg::where('product_id',$id)->delete();
        }

        $notification = array(
            'message' => 'Product Deleted successfully',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }

    public function multiImgUpdate(Request $request){
        $imgs = $request->multi_img;

        foreach($imgs as $id => $img){
            $imgDel = MultiImg::findOrFail($id);
            unlink($imgDel->photo_name);

        
        $image_make = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
        Image::make($img)->resize(917, 1000)->save('upload/products/multi_img/'.$image_make);
        $uploadPath = 'upload/products/multi_img/'.$image_make;

        MultiImg::where('id',$id)->update([
            'photo_name' => $uploadPath,
            'updated_at' => Carbon::now(),
        ]);       


        }
        $notification = array(
            'message' => 'Product image Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function thumbnailImgUpdate(Request $request){
        $thumbnailImg_Id = $request->id;
        $oldImg = $request->oldImage;
        unlink($oldImg);
        
        $image = $request->file('product_thumbnail');
        $image_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(917, 1000)->save('upload/products/thambnail/'.$image_gen);
        $save_url = 'upload/products/thambnail/'.$image_gen;

        Product::findOrFail($thumbnailImg_Id)->update([
            'product_thumbnail' => $save_url,
            'updated_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Product image Thumbnail Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('manage.product')->with($notification);
        
    }
// multi image deleting
    public function productMultiImgDelete($id){
        $oldimg = MultiImg::findOrFail($id);
        unlink($oldimg->photo_name);
        MultiImg::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Product MultiImage Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function productInactive($id){
        Product::findOrFail($id)->update(['status' => 0]);

        $notification = array(
            'message' => 'Product Inactive Successfully',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }

    public function productActive($id){
        Product::findOrFail($id)->update(['status' => 1 ]);

        $notification = array(
            'message' => 'Product Active Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
        
    }

    public function productDetails($id){
        $productDetails = Product::findOrFail($id);
        return view('backend.product.product_details', compact('productDetails'));
    }//end method

    //product stock ..............
    public function productStock(){
        $products = Product::latest()->get();
        return view('backend.product.product_stock', compact('products'));
    }
}
