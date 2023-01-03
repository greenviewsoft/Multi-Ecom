<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use Image;

class BlogController extends Controller
{
    public function AllBlogCategory(){
        $blogcategories = BlogCategory::latest()->get();
        return view('backend.blog.category.blogcategory_all',compact('blogcategories'));
    }

    public function AddBlogCategory(){
       
       return view('backend.blog.category.blogcategroy_add');
    }

    public function StoreBlogCateogry(Request $request){
        BlogCategory::insert([
            'blog_category_name' => $request->blog_category_name,
            'blog_category_slug' => strtolower(str_replace(' ', '-',$request->blog_category_name)),
            'created_at' => Carbon::now(), 
        ]);

       $notification = array(
            'message' => 'Blog Category Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.blog.category')->with($notification); 

    }// End Method 

    public function EditBlogCateogry($id){

        $blogcategoryies = BlogCategory::findOrFail($id);
        return view('backend.blog.category.blogcategroy_edit',compact('blogcategoryies'));

    }// End Method 

     public function UpdateBlogCateogry(Request $request){

      $blog_id = $request->id;

        BlogCategory::findOrFail($blog_id)->update([
            'blog_category_name' => $request->blog_category_name,
            'blog_category_slug' => strtolower(str_replace(' ', '-',$request->blog_category_name)), 
        ]);

       $notification = array(
            'message' => 'Blog Category Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.blog.category')->with($notification); 

    }// End Method 


    public function DeleteBlogCateogry($id){
        BlogCategory::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Blog Category Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification); 
    }// End Method 





////////// Blog Post Method /////////////////////

public function AllBlogPost(){

 $blogpost = BlogPost::latest()->get();
        return view('backend.blog.post.blogpost_all',compact('blogpost'));
}// End method 



public function AddBlogPost() {
    $BlogCategory = BlogCategory::latest()->get();
     return view('backend.blog.post.blogpost_add',compact('BlogCategory'));
} // End Method


public function StoreBlogPost(Request $request)
{
    $image = $request->file('post_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(1103,906)->save('upload/blog/'.$name_gen);
        $save_url = 'upload/blog/'.$name_gen;

        BlogPost::insert([
            'category_id' => $request->category_id,
            'post_title' => $request->post_title,
            'post_short_description' => $request->post_short_description,
            'post_long_description' => $request->post_long_description,
            'post_slug' => strtolower(str_replace(' ', '-',$request->post_title)),
            'post_image' => $save_url,
            'created_at' => Carbon::now(),
        ]);

       $notification = array(
            'message' => 'Blog Post Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.blog.post')->with($notification);

    }// End Method


public function EditBlogPost($id)
{   $blogcategory = BlogCategory::OrderBy('blog_category_name', 'ASC')->get();
    $blogpost = BlogPost::findOrFail($id);
        return view('backend.blog.post.blogpost_edit',compact('blogpost','blogcategory'));
    }// End Method



    public function UpdateBlogPost(Request $request){

        $post_id = $request->id;
        $old_img = $request->old_image;

        if ($request->file('post_image')) {

        $image = $request->file('post_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(1103,906)->save('upload/blog/'.$name_gen);
        $save_url = 'upload/blog/'.$name_gen;

        if (file_exists($old_img)) {
           unlink($old_img);
        }

        BlogPost::findOrFail($post_id)->update([
            'category_id' => $request->category_id,
            'post_title' => $request->post_title,
            'post_slug' => strtolower(str_replace(' ', '-',$request->post_title)),
            'post_short_description' => $request->post_short_description,
            'post_long_description' => $request->post_long_description,
            'post_image' => $save_url, 
            'updated_at' => Carbon::now(),
        ]);

       $notification = array(
            'message' => 'Blog Post Updated with image Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.blog.post')->with($notification); 

        } else {

            BlogPost::findOrFail($post_id)->update([
            'category_id' => $request->category_id,
            'post_title' => $request->post_title,
            'post_slug' => strtolower(str_replace(' ', '-',$request->post_title)),
            'post_short_description' => $request->post_short_description,
            'post_long_description' => $request->post_long_description, 
            'updated_at' => Carbon::now(),
        ]);

       $notification = array(
            'message' => 'Blog Post Updated without image Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.blog.post')->with($notification); 

        } // end else

    }// End Method 





    public function DeleteBlogPost($id)
    {

       $category = BlogPost::findOrFail($id);
        $img = $category->post_image;
        unlink($img);
       
     BlogPost::findOrFail($id)->delete();



      $notification = array(
            'message' => 'Blog Post Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification); 
    }// End Method 




//////// Frontend Blog Show ////////////////

public function AllBlog()
{
       $blogcategory = BlogCategory::latest()->get();
        $blogpost = BlogPost::latest()->get();
        return view('frontend.blog.home_blog',compact('blogcategory','blogpost'));

}// End Method


public function PostDetails($id,$slug)
{
  $blogcategory = BlogCategory::latest()->get();
        $blogdetails = BlogPost::findOrFail($id);
        $breadcat = BlogCategory::where('id',$id)->get();
        return view('frontend.blog.blog_details',compact('blogcategory','blogdetails','breadcat'));
} // End method


}

