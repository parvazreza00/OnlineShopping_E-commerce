<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog\BlogPostCategory;
use App\Models\Blog\BlogPost;
use Carbon\Carbon;
use Image;

class BlogController extends Controller
{
    public function blogCategory(){
        $blogCategory = BlogPostCategory::latest()->get();
        return view('backend.blog.category.category_view',compact('blogCategory'));
    }//end method

    public function blogCategoryStory(Request $request){
        $request->validate([
            'blog_category_name_en' => 'required',
            'blog_category_name_hin' => 'required',              
        ],[
            'blog_category_name_en.required' => 'Blog Category English Name Required',
            'blog_category_name_hin.required' => 'Blog Category Hindi Name Required',
        ]);       

        BlogPostCategory::insert([
            'blog_category_name_en' => $request->blog_category_name_en,
            'blog_category_name_hin' => $request->blog_category_name_hin,
            'blog_category_slug_en' => strtolower(str_ireplace(' ', '-', $request->blog_category_name_en)),
            'blog_category_slug_hin' => str_ireplace(' ', '-', $request->blog_category_name_hin),
            'created_at' => Carbon::now(),
            
        ]);
        $notification = array(
            'message' => 'BLog Category inserted successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }//end method

    //blog category edit
    public function blogCategoryEdit($id){
        $blogCategory = BlogPostCategory::findOrFail($id);
        return view('backend.blog.category.blogcategory_edit', compact('blogCategory'));
    }//end method

    public  function blogCategoryUpdate(Request $request,$id){
        // $cate_id = $request->id;

        BlogPostCategory::findOrFail($id)->update([
            'blog_category_name_en' => $request->blog_category_name_en,
            'blog_category_name_hin' => $request->blog_category_name_hin,
            'blog_category_slug_en' => strtolower(str_ireplace(' ', '-', $request->blog_category_name_en)),
            'blog_category_slug_hin' => str_ireplace(' ', '-', $request->blog_category_name_hin),
            'updated_at' => Carbon::now(),
            
        ]);
        $notification = array(
            'message' => 'Blog Category Update Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('blog.category')->with($notification);
    }//end method


    public function blogCategoryDelete($id){
        BlogPostCategory::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Blog Category Deleted successfully',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }//end method 

    // blog post view all method --------------------------------

    public function listBlogPost(){
        $blogPost = BlogPost::with('blocPostCategory')->latest()->get();
        return view('backend.blog.post.post_list',compact('blogPost'));
    }

    public function addBlogPost(){
        $blogCategory = BlogPostCategory::latest()->get();
        $blogPost = BlogPost::latest()->get();
        return view('backend.blog.post.post_add',compact('blogPost','blogCategory'));
    }//end mehtod

    public function BlogPostStore(Request $request){
        
        $request->validate([
            'post_title_en' => 'required',
            'post_title_hin' => 'required',            
            'post_image' => 'required',
        ],[
            'post_title_en.required' => 'Post Title English Required',
            'post_title_hin.required' => 'Post Title Hindi Required',
        ]);

        $image = $request->file('post_image');
        $image_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(780, 433)->save('upload/blogPost/'.$image_gen);
        $save_url = 'upload/blogPost/'.$image_gen;

        BlogPost::insert([
            'category_id' => $request->category_id,
            'post_title_en' => $request->post_title_en,
            'post_title_hin' => $request->post_title_hin,
            'post_slug_en' => strtolower(str_ireplace(' ', '-', $request->post_title_en)),
            'post_slug_hin' => str_ireplace(' ', '-', $request->post_title_hin),
            'post_image' => $save_url,
            'post_details_en' => $request->post_details_en,
            'post_details_hin' => $request->post_details_hin,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Brand inserted successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('list.post')->with($notification);
    }//end method

    public function BlogPostEdit($id){
        $blogCategory = BlogPostCategory::orderBy('blog_category_name_en','Desc')->get();
        $blogPost = BlogPost::findOrFail($id);
        return view('backend.blog.post.post_edit', compact('blogPost','blogCategory'));
    }//end method


    public function BlogPostUpdate(Request $request, $id){

        $old_img = $request->old_image;

        if($request->file('post_image')){

        @unlink($old_img);
        $image = $request->file('post_image');
        $image_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(780, 433)->save('upload/blogPost/'.$image_gen);
        $save_url = 'upload/blogPost/'.$image_gen;

        BlogPost::findOrFail($id)->update([
            'category_id' => $request->category_id,
            'post_title_en' => $request->post_title_en,
            'post_title_hin' => $request->post_title_hin,
            'post_slug_en' => strtolower(str_ireplace(' ', '-', $request->post_title_en)),
            'post_slug_hin' => str_ireplace(' ', '-', $request->post_title_hin),
            'post_image' => $save_url,
            'post_details_en' => $request->post_details_en,
            'post_details_hin' => $request->post_details_hin,
            'updated_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Post Updated with Image',
            'alert-type' => 'success'
        );
        return redirect()->route('list.post')->with($notification);
    }else{//end if

        BlogPost::findOrFail($id)->update([
            'category_id' => $request->category_id,
            'post_title_en' => $request->post_title_en,
            'post_title_hin' => $request->post_title_hin,
            'post_slug_en' => strtolower(str_ireplace(' ', '-', $request->post_title_en)),
            'post_slug_hin' => str_ireplace(' ', '-', $request->post_title_hin),            
            'post_details_en' => $request->post_details_en,
            'post_details_hin' => $request->post_details_hin,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Blog Post update without Image',
            'alert-type' => 'success'
        );
        return redirect()->route('list.post')->with($notification);
        }//end else
    }//end method


    public function BlogPostDelete($id){
        $blogPost = BlogPost::findOrFail($id);
        $img = $blogPost->post_image;
        unlink($img);
        BlogPost::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Blog Post Deleted successfully',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
}
