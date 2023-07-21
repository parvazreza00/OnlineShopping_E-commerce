<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function categoryView(){
        $category = Category::latest()->get();
        return view('backend.category.category_view', compact('category'));
    }

    public function categoryStore(Request $request){
        $request->validate([
            'category_name_en' => 'required',
            'category_name_hin' => 'required',            
            'category_icon' => 'required',            
        ],[
            'category_name_en.required' => 'Category English Name Required',
            'category_name_hin.required' => 'Category Hindi Name Required',
        ]);       

        Category::insert([
            'category_name_en' => $request->category_name_en,
            'category_name_hin' => $request->category_name_hin,
            'category_slug_en' => strtolower(str_ireplace(' ', '-', $request->category_name_en)),
            'category_slug_hin' => str_ireplace(' ', '-', $request->category_name_hin),
            'category_icon' => $request->category_icon,
        ]);
        $notification = array(
            'message' => 'Category inserted successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }//end method

    public function categoryEdit($id){
        $category = Category::findOrFail($id);
        return view('backend.category.category_edit', compact('category'));
    }

    public  function updateCategory(Request $request){
        $cate_id = $request->id;

        Category::findOrFail($cate_id)->update([
            'category_name_en' => $request->category_name_en,
            'category_name_hin' => $request->category_name_hin,
            'category_slug_en' => strtolower(str_ireplace(' ', '-', $request->category_name_en)),
            'category_slug_hin' => str_ireplace(' ', '-', $request->category_name_hin),
            'category_icon' => $request->category_icon,
            
        ]);
        $notification = array(
            'message' => 'Category Update Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.category')->with($notification);
    }

    public function categoryDelete($id){

        Category::findOrFail($id)->delete();
        $notification = array(
            'message' => 'category Deleted successfully',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
}
