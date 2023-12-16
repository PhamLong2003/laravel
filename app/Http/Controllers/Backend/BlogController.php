<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Comment;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;



class BlogController extends Controller
{
    public function AllBlogCategory() {
        $category = BlogCategory::latest()->get();
        return view('backend.blog.blog_category',compact('category'));
    }//end method

    public function StoreBlogCategory(Request $request) {
           
        BlogCategory::insert ([
            'category_name' => $request->category_name,
            'category_slug' => strtolower(str_replace(' ','-',$request->category_name)),
        ]);
        $notification = array(
            'message' => 'Thêm bài viết thành công',
            'alert-type' => 'success'
      );
      return redirect()->route('all.blog.category')->with($notification);
    }//end method

    public function EditBlogCategory($id) {

        $categories = BlogCategory::findOrFail($id);
        return response()->json($categories);

    }//end method

    public function UpdateBlogCategory(Request $request) {

        $cat_id = $request->cat_id;
           
        BlogCategory::findOrFail($cat_id)->update([
            'category_name' => $request->category_name,
            'category_slug' => strtolower(str_replace(' ','-',$request->category_name)),
        ]);
        $notification = array(
            'message' => 'Cập nhật danh mục bài viết thành công',
            'alert-type' => 'success'
      );
      return redirect()->route('all.blog.category')->with($notification);
    }//end method

    public function DeleteBlogCategory($id) {

        BlogCategory::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Xóa danh mục bài viết thành công',
            'alert-type' => 'success'
      );
      return redirect()->back()->with($notification);

    }//end method


    public function AllPost() {
        $post = BlogPost::latest()->get();
        return view('backend.post.all_post',compact('post'));

    }//end method

    public function AddPost() {
        $blogcat = BlogCategory::latest()->get();
        return view('backend.post.add_post',compact('blogcat'));
    }//end method

    public function StorePost(Request $request) {

        if($request->file('post_image')) {
            $image_p = $request->file('post_image')->getClientOriginalName();
            $path = $request->file('post_image')->storeAs('public/post', $image_p);
        }

        BlogPost::insert([
            'blogcat_id' => $request->blogcat_id,
            'user_id' => Auth::user()->id,
            'post_title' => $request->post_title,
            'post_slug' => strtolower(str_replace(' ','-',$request->post_title)),
            'short_descp' => $request->short_descp,
            'long_descp' => $request->long_descp,
            'post_tags' => $request->post_tags,
            'post_image' => $image_p,
            'created_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'Thêm bài viết thành công',
            'alert-type' => 'success'
      );

      return redirect()->route('all.post')->with($notification);

    }//end method

    public function EditPost($id) {
        $blogcat = BlogCategory::latest()->get();
        $post = BlogPost::findOrFail($id);
        return view('backend.post.edit_post',compact('post','blogcat'));


    }
    public function UpdatePost(Request $request) {
        $post_id = $request->id;

        if($request->file('post_image')) {
            if($request->file('post_image')) {
                $image = $request->file('post_image')->getClientOriginalName();
                $path = $request->file('post_image')->storeAs('public/post', $image);
            }
    
            BlogPost::findOrFail($post_id)->update([
            'blogcat_id' => $request->blogcat_id,
            'user_id' => Auth::user()->id,
            'post_title' => $request->post_title,
            'post_slug' => strtolower(str_replace(' ','-',$request->post_title)),
            'short_descp' => $request->short_descp,
            'long_descp' => $request->long_descp,
            'post_tags' => $request->post_tags,
            'post_image' => $image,
            'created_at' => Carbon::now(),
            ]);
    
            $notification = array(
                'message' => 'Sửa bài viết thành công',
                'alert-type' => 'success'
          );
    
          return redirect()->route('all.post')->with($notification);

        }else{
           
            BlogPost::findOrFail($post_id)->update([
                'blogcat_id' => $request->blogcat_id,
                'user_id' => Auth::user()->id,
                'post_title' => $request->post_title,
                'post_slug' => strtolower(str_replace(' ','-',$request->post_title)),
                'short_descp' => $request->short_descp,
                'long_descp' => $request->long_descp,
                'post_tags' => $request->post_tags,
                'created_at' => Carbon::now(),
                ]);
        
                $notification = array(
                    'message' => 'Sửa bài viết thành công',
                    'alert-type' => 'success'
              );
        
              return redirect()->route('all.post')->with($notification);
            }

    }//end method

    public function DeletePost($id) {
        $post = BlogPost::findOrFail($id);

        Storage::delete('storage/post'.$post->post_image);
        BlogPost::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Xóa bài viết thành công',
            'alert-type' => 'success'
      );

      return redirect()->back()->with($notification);
    }//end method

    public function BlogDetails($slug) {
        $blog = BlogPost::where('post_slug',$slug)->first();
        $tags = $blog->post_tags;
        $tags_all = explode(',',$tags);
        $bcategory = BlogCategory::latest()->get();
        $dpost = BlogPost::latest()->limit(3)->get();

        return view('frontend.blog.blog_details',compact('blog','tags_all','bcategory','dpost'));
    }//end method


    public function BlogCatList($id) {
        $blog = BlogPost::where('blogcat_id',$id)->get();
        $breadcat = BlogCategory::where('id',$id)->first();
        $bcategory = BlogCategory::latest()->get();
        $dpost = BlogPost::latest()->limit(3)->get();

        return view('frontend.blog.blog_cat_list',compact('blog','breadcat','dpost','bcategory'));
    }//end method


    public function BlogList() {
        $blog = BlogPost::latest()->get();
        $bcategory = BlogCategory::latest()->get();
        $dpost = BlogPost::latest()->limit(3)->get();

        return view('frontend.blog.blog_list',compact('blog','dpost','bcategory'));
    }//end method

    public function StoreComment(Request $request) {
        $pid = $request->post_id;

        Comment::insert([
            'user_id' => Auth::user()->id,
            'post_id' => $pid,
            'parent_id' => null,
            'subject' => $request->subject,
            'message' => $request->message,
            'created_at' => Carbon::now()

        ]);

        $notification = array(
            'message' => 'Bình luận viết thành công',
            'alert-type' => 'success'
      );

      return redirect()->back()->with($notification);
    }//end method


}
