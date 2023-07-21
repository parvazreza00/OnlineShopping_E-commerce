<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog\BlogPost;
use App\Models\Blog\BlogPostCategory;
use Illuminate\Http\Request;

class HomeBlogController extends Controller
{
    public function homeBlog(){
        $blogCategory = BlogPostCategory::latest()->get();
        $blogPost = BlogPost::latest()->get();
        return view('frontend.blog.blog_list', compact('blogCategory','blogPost'));
    }//end method

    public function detailsBlogPost($id){
        $blogCategory = BlogPostCategory::latest()->get();
        $blogPost = BlogPost::findOrFail($id);
        return view('frontend.blog.blog_details',compact('blogPost','blogCategory'));
    }//end method

    public function blogPostCategory($category_id){
        $blogCategory = BlogPostCategory::latest()->get();
        $blogPost = BlogPost::where('category_id',$category_id)->orderBy('id','DESC')->get();
        return view('frontend.blog.blog_cat_list', compact('blogCategory','blogPost'));
    }//end method
}
