<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Carbon\Carbon;
use Image;

class AdminUserController extends Controller
{
    public function allAdminRole(){
        $adminUser = Admin::where('type',2)->latest()->get();
        return view('backend.role.admin_role_all',compact('adminUser'));
    }//end method

    public function addAdminRole(){
        return view('backend.role.admin_role_create');
    }//end method

    public function storeAdminRole(Request $request){

        $image = $request->file('profile_photo_path');
        $image_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(225, 225)->save('upload/admin_images/'.$image_gen);
        $save_url = 'upload/admin_images/'.$image_gen;

        Admin::insert([
            'name' => $request->name,
            'email' => $request->email,
            'phone' =>  $request->phone,
            'password' => Hash::make($request->password),
            'brand' => $request->brand,
            'category' => $request->category,
            'product' => $request->product,
            'slider' => $request->slider,
            'coupons' => $request->coupons,
            'shipping' => $request->shipping,
            'blog' => $request->blog,
            'setting' => $request->setting,
            'returnorder' => $request->returnorder,
            'review' => $request->review,
            'orders' => $request->orders,
            'stock' => $request->stock,
            'reports' => $request->reports,
            'alluser' => $request->alluser,
            'adminuserrole' => $request->adminuserrole,
            'type' => 2,            
            'profile_photo_path' => $save_url,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Admin User Created successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.admin.user')->with($notification);
    }//end method

    public function EditAdminRole($id){
        $adminUser = Admin::findOrFail($id);
        return view('backend.role.admin_role_edit',compact('adminUser'));
    }//end method

    public function updateAdminRole(Request $request){
        $adminUser_id = $request->id;
        $old_img = $request->old_image;

        if($request->file('profile_photo_path')){

            @unlink($old_img);
            $image = $request->file('profile_photo_path');
            $image_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(225, 225)->save('upload/admin_images/'.$image_gen);
            $save_url = 'upload/admin_images/'.$image_gen;
    
            Admin::findOrFail($adminUser_id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' =>  $request->phone,                
                'brand' => $request->brand,
                'category' => $request->category,
                'product' => $request->product,
                'slider' => $request->slider,
                'coupons' => $request->coupons,
                'shipping' => $request->shipping,
                'blog' => $request->blog,
                'setting' => $request->setting,
                'returnorder' => $request->returnorder,
                'review' => $request->review,
                'orders' => $request->orders,
                'stock' => $request->stock,
                'reports' => $request->reports,
                'alluser' => $request->alluser,
                'adminuserrole' => $request->adminuserrole,
                'type' => 2,            
                'profile_photo_path' => $save_url,
                'updated_at' => Carbon::now(),
            ]);
            $notification = array(
                'message' => 'Admin User Updated With Image',
                'alert-type' => 'success'
            );
            return redirect()->route('all.admin.user')->with($notification);

        }else{
            Admin::findOrFail($adminUser_id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' =>  $request->phone,                
                'brand' => $request->brand,
                'category' => $request->category,
                'product' => $request->product,
                'slider' => $request->slider,
                'coupons' => $request->coupons,
                'shipping' => $request->shipping,
                'blog' => $request->blog,
                'setting' => $request->setting,
                'returnorder' => $request->returnorder,
                'review' => $request->review,
                'orders' => $request->orders,
                'stock' => $request->stock,
                'reports' => $request->reports,
                'alluser' => $request->alluser,
                'adminuserrole' => $request->adminuserrole,
                'type' => 2,            
               
                'updated_at' => Carbon::now(),
                
            ]);
            $notification = array(
                'message' => 'Admin User Updated Without Image',
                'alert-type' => 'success'
            );
            return redirect()->route('all.admin.user')->with($notification);

        }//end else
    }//end method

    public function deleteAdminRole($id){
        $adminUser = Admin::findOrFail($id);
        $old_img = $adminUser->profile_photo_path;
        unlink($old_img);

        Admin::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Admin User Deleted successfully',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
}
