<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;
use App\Models\SubSubCategory;

class SubCategoryController extends Controller
{
    public function subcategoryView(){
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $subcategory = SubCategory::latest()->get();
        return view('backend.category.subcategory_view', compact('subcategory','categories'));
    }

    public function subcategoryStore(Request $request){
        $request->validate([
            'category_id' => 'required',
            'subcategory_name_en' => 'required',
            'subcategory_name_hin' => 'required',                        
        ],[
            'category_id.required' => 'Please, Select andy Option',
            'subcategory_name_en.required' => 'SubCategory English Name Required',
            'subcategory_name_hin.required' => 'SubCategory Hindi Name Required',
        ]);       

        SubCategory::insert([
            'category_id' => $request->category_id,
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_hin' => $request->subcategory_name_hin,
            'subcategory_slug_en' => strtolower(str_ireplace(' ', '-', $request->subcategory_name_en)),
            'subcategory_slug_hin' => str_ireplace(' ', '-', $request->subcategory_name_hin),
            
        ]);
        $notification = array(
            'message' => 'subCategory inserted successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function subcategoryEdit($id){
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $subcategory = SubCategory::findOrFail($id);
        return view('backend.category.subcategory_edit', compact('subcategory','categories'));
    }

    public  function updateSubCategory(Request $request){
        $subcate_id = $request->id;

        SubCategory::findOrFail($subcate_id)->update([
            'category_id' => $request->category_id,
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_hin' => $request->subcategory_name_hin,
            'subcategory_slug_en' => strtolower(str_ireplace(' ', '-', $request->subcategory_name_en)),
            'subcategory_slug_hin' => str_ireplace(' ', '-', $request->subcategory_name_hin),
            
            
        ]);
        $notification = array(
            'message' => 'SubCategory Update Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.subcategory')->with($notification);
    }

    public function subcategoryDelete($id){

        SubCategory::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Subcategory Deleted successfully',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }

    // ------------------------------------admin sub subcategory--------------------
    public function subSubCategoryView(){
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $subsubcategory = SubSubCategory::latest()->get();
        return view('backend.category.sub_subcategory_view', compact('subsubcategory','categories'));
    }

    //js function for getting subCategory
    public function getSubCategory($category_id){
        $subcat = SubCategory::where('category_id',$category_id)->orderBy('subcategory_name_en','ASC')->get();
        return json_encode($subcat);
    }

    //js function for getting subsubCategory
    public function getSubSubCategory($subcategory_id){
        $subsubcat = SubSubCategory::where('subcategory_id',$subcategory_id)->orderBy('subsubcategory_name_en','ASC')->get();
        return json_encode($subsubcat);
    }


    public function subSubCategoryStore(Request $request){
        $request->validate([
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'subsubcategory_name_en' => 'required',
            'subsubcategory_name_hin' => 'required',                        
        ],[
            'category_id.required' => 'Please, Select any Option',
            'subcategory_id.required' => 'Please, Select any Option',
        'subsubcategory_name_en.required' => 'Sub-SubCategory English Name Required',
        'subsubcategory_name_hin.required' => 'Sub-SubCategory Hindi Name Required',
        ]);       

        SubSubCategory::insert([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_name_en' => $request->subsubcategory_name_en,
            'subsubcategory_name_hin' => $request->subsubcategory_name_hin,
            'subsubcategory_slug_en' => strtolower(str_ireplace(' ', '-', $request->subsubcategory_name_en)),
            'subsubcategory_slug_hin' => str_ireplace(' ', '-', $request->subsubcategory_name_hin),
            
        ]);
        $notification = array(
            'message' => 'SubSubCategory inserted successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function subSubCategoryEdit($id){
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $subcategories = SubCategory::orderBy('subcategory_name_en', 'ASC')->get();
        $subsubcategories = SubSubCategory::findOrFail($id);
        return view('backend.category.sub_subcategory_edit',compact('subsubcategories','subcategories','categories'));
    }

    public  function updateSubSubCategory(Request $request){
        $subsubcate_id = $request->id;

        SubSubCategory::findOrFail($subsubcate_id)->update([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_name_en' => $request->subsubcategory_name_en,
            'subsubcategory_name_hin' => $request->subsubcategory_name_hin,
            'subsubcategory_slug_en' => strtolower(str_ireplace(' ', '-', $request->subsubcategory_name_en)),
            'subsubcategory_slug_hin' => str_ireplace(' ', '-', $request->subsubcategory_name_hin),
            
            
        ]);
        $notification = array(
            'message' => 'SubSubCategory Update Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.subsubcategory')->with($notification);
    }

    public function subSubCategoryDelete($id){
        SubSubCategory::findOrFail($id)->delete();
        $notification = array(
            'message' => 'SubSubcategory Deleted successfully',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }

}
