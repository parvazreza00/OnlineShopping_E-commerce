<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Carbon\Carbon;
use Image;

class SliderController extends Controller
{
    public function sliderView(){
        $sliders = Slider::latest()->get();
        return view('backend.slider.slider_view', compact('sliders'));
    }

    public function sliderStore(Request $request){
        $request->validate([
            
            'slider_img' => 'required',
        ],[
            'slider_img.required' => 'Slider Image is Required',
            
        ]);

        $image = $request->file('slider_img');
        $image_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(870, 370)->save('upload/slider/'.$image_gen);
        $save_url = 'upload/slider/'.$image_gen;

        Slider::insert([
            'slider_img' => $save_url,
            'title' => $request->title,
            'desc' => $request->desc,           
            'created_at' => Carbon::now()
        ]);
        $notification = array(
            'message' => 'Slider inserted successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function sliderEdit($id){
        $sliders = Slider::findOrFail($id);
        return view('backend.slider.slider_edit', compact('sliders'));
    }

    public function updateSlider(Request $request){
        $slider_id = $request->id;
        $old_img = $request->old_image;

        if($request->file('slider_img')){

            @unlink($old_img);

            $image = $request->file('slider_img');
            $image_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(870, 370)->save('upload/slider/'.$image_gen);
            $save_url = 'upload/slider/'.$image_gen;
    
            Slider::findOrFail($slider_id)->update([
                'title' => $request->title,
                'desc' => $request->desc,                
                'slider_img' => $save_url,
                'updated_at' => Carbon::now(),
            ]);
            $notification = array(
                'message' => 'Slider Update With Image',
                'alert-type' => 'success'
            );
            return redirect()->route('manage-slider')->with($notification);

        }else{
            Slider::findOrFail($slider_id)->update([
                'title' => $request->title,
                'desc' => $request->desc,                
                'updated_at' => Carbon::now(),
                
            ]);
            $notification = array(
                'message' => 'Slider Update Without Image',
                'alert-type' => 'success'
            );
            return redirect()->route('manage-slider')->with($notification);

        }//end else
    }

    public function sliderDelete($id){
        $slider = Slider::findOrFail($id);
        $slider_img = $slider->slider_img;
        unlink($slider_img);
        Slider::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Slider Deleted successfully',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }

    public function sliderInactive($id){
        Slider::findOrFail($id)->update(['status' => 0]);

        $notification = array(
            'message' => 'Slider Inactive Successfully',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }

    public function sliderActive($id){
        Slider::findOrFail($id)->update(['status' => 1 ]);

        $notification = array(
            'message' => 'Slider Active Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
        
    }

}
