<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use Carbon\Carbon;
use App\Models\User;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;


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
        return view('backend.post.all_post');

    }//end method


}
