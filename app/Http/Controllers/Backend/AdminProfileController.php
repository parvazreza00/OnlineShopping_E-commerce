<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Image;


class AdminProfileController extends Controller
{
    public function adminProfile(){
        $id = Auth::user()->id;
        $adminData = Admin::find($id);
        return view('admin.admin_profile_view', compact('adminData'));
    }

    public function adminProfileEdit(){
        $id = Auth::user()->id;
        $editData = Admin::find($id);
        return view('admin.admin_profile_edit', compact('editData'));
    }

    public function adminProfileStore(Request $request){
        $id = Auth::user()->id;
        $data = Admin::find($id);

        // $name = $data->name;
        // $email = $data->email;
        // $profile_photo = $data->profile_photo_path;

        $data->name = $request->name;
        $data->email = $request->email;

        if($request->file('profile_photo_path')){          

        @unlink(public_path('upload/admin_images/'.$data->profile_photo_path));
            $image = $request->file('profile_photo_path');
            $image_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(225, 225)->save('upload/admin_images/'.$image_gen);
            // $save_url = 'upload/admin_images/'.$image_gen;
            $data['profile_photo_path'] = $image_gen;

            // Admin::findOrFail($data)->update([
            //     'name' => $name,
            //     'email' => $email,
            //     'profile_photo_path' => $save_url,
            // ]);
        }   
        $data->save();

        $notification = array(
            'message' => 'Admin Profile updated successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.profile')->with($notification);
    
    }

    public function adminChangePassword(){
        return view('admin.admin_change_password');
    }

    public function adminUpdateChangePassword(Request $request){
        $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hashpassword = Auth::user()->password;
        if(Hash::check($request->oldpassword,$hashpassword)){
            $admin = Admin::find(Auth::id());
            $admin->password = Hash::make($request->password);
            $admin->save();
            Auth::logout();
            return redirect()->route('admin.logout');
        }else{
            return redirect()->back();
        }

    }//end method

    public function allUser(){
        $users = User::latest()->get();
        return view('backend.user.all_user',compact('users'));
    }
    

}
