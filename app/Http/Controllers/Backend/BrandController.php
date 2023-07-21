<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Image;

class BrandController extends Controller
{
    public function brandView(){
        $brands = Brand::latest()->get();
        return view('backend.brand.brand_view', compact('brands'));
    }

    public function brandStore(Request $request){
        $request->validate([
            'brand_name_en' => 'required',
            'brand_name_hin' => 'required',
            'brand_image' => 'required',
        ],[
            'brand_name_en.required' => 'Brand English Name Required',
            'brand_name_hin.required' => 'Brand Hindi Name Required',
        ]);

        $image = $request->file('brand_image');
        $image_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(300, 300)->save('upload/brand/'.$image_gen);
        $save_url = 'upload/brand/'.$image_gen;

        Brand::insert([
            'brand_name_en' => $request->brand_name_en,
            'brand_name_hin' => $request->brand_name_hin,
            'brand_slug_en' => strtolower(str_ireplace(' ', '-', $request->brand_name_en)),
            'brand_slug_hin' => str_ireplace(' ', '-', $request->brand_name_hin),
            'brand_image' => $save_url,
        ]);
        $notification = array(
            'message' => 'Brand inserted successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function brandEdit($id){
        $brand = Brand::findOrFail($id);
        return view('backend.brand.brand_edit', compact('brand'));
    }

    public function updateBrand(Request $request){
        $brand_id = $request->id;
        $old_img = $request->old_image;

        if($request->file('brand_image')){

            @unlink($old_img);
            $image = $request->file('brand_image');
            $image_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('upload/brand/'.$image_gen);
            $save_url = 'upload/brand/'.$image_gen;
    
            Brand::findOrFail($brand_id)->update([
                'brand_name_en' => $request->brand_name_en,
                'brand_name_hin' => $request->brand_name_hin,
                'brand_slug_en' => strtolower(str_ireplace(' ', '-', $request->brand_name_en)),
                'brand_slug_hin' => str_ireplace(' ', '-', $request->brand_name_hin),
                'brand_image' => $save_url,
            ]);
            $notification = array(
                'message' => 'Brand Update With Image',
                'alert-type' => 'info'
            );
            return redirect()->route('all.brand')->with($notification);

        }else{
            Brand::findOrFail($brand_id)->update([
                'brand_name_en' => $request->brand_name_en,
                'brand_name_hin' => $request->brand_name_hin,
                'brand_slug_en' => strtolower(str_ireplace(' ', '-', $request->brand_name_en)),
                'brand_slug_hin' => str_ireplace(' ', '-', $request->brand_name_hin),
                
            ]);
            $notification = array(
                'message' => 'Brand Update Without Image',
                'alert-type' => 'info'
            );
            return redirect()->route('all.brand')->with($notification);

        }//end else
    }//end method............

    public function brandDelete($id){
        $brand = Brand::findOrFail($id);
        $img = $brand->brand_image;
        unlink($img);
        Brand::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Brand Deleted successfully',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
}
