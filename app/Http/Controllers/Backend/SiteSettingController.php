<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SiteSetting;
use App\Models\Seo;
use Image;
use Carbon\Carbon;

class SiteSettingController extends Controller
{
    public function siteSetting(){
        $setting = SiteSetting::find(1);
        return view('backend.setting.setting_update',compact('setting'));
    }//end method

    public function siteSettingUpdate(Request $request,$id){
        $setting_id = $request->id;        

        if($request->file('logo')){
            $image = $request->file('logo');
            $image_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(139, 36)->save('upload/logo/'.$image_gen);
            $save_url = 'upload/logo/'.$image_gen;
    
            SiteSetting::findOrFail($id)->update([
                'phone_one' => $request->phone_one,
                'phone_two' => $request->phone_two,
                'email' => $request->email,
                'company_name' => $request->company_name,
                'company_address' => $request->company_address,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'linkedin' => $request->linkedin,
                'youtube' => $request->youtube,                
                'logo' => $save_url,
                'created_at' => Carbon::now()
            ]);
            $notification = array(
                'message' => 'Setting Update With Image/Logo',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);

        }else{
            SiteSetting::findOrFail($id)->update([
                'phone_one' => $request->phone_one,
                'phone_two' => $request->phone_two,
                'email' => $request->email,
                'company_name' => $request->company_name,
                'company_address' => $request->company_address,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'linkedin' => $request->linkedin,
                'youtube' => $request->youtube,                
                
                'created_at' => Carbon::now()
                
            ]);
            $notification = array(
                'message' => 'Setting Update Without Image/Logo',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);

        }//end else
    }//end method

    public function seoSetting(){
        $seo = Seo::find(1);
        return view('backend.setting.seo_update',compact('seo'));
    }//end method

    public function seoSettingUpdate(Request $request,$id){
        $seo_id = $request->id; 

        Seo::findOrFail($id)->update([
            'meta_title' => $request->meta_title,
            'meta_author' => $request->meta_author,
            'meta_keyword' => $request->meta_keyword,
            'meta_description' => $request->meta_description,
            'google_analytics' => $request->google_analytics,                          
            'updated_at' => Carbon::now()
        ]);
        $notification = array(
            'message' => 'Seo Update Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }
}
