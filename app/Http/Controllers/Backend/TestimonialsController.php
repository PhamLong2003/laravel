<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PropertyType;
use App\Models\Testimonial;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class TestimonialsController extends Controller
{
    public function AllTestimonials() {
        $testimonial = Testimonial::latest()->get();
        return view('backend.testimonial.all_testimonial',compact('testimonial'));

    }//end method

    public function AddTestimonials() {
        return view('backend.testimonial.add_testimonial');
    }

    public function StoreTestimonials(Request $request) {

        if($request->file('image')) {
            $image_it = $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('public/testimonial', $image_it);
        }

        Testimonial::insert([
            'name' => $request->name,
            'position' => $request->position,
            'message' => $request->message,
            'image' => $image_it,
        ]);

        $notification = array(
            'message' => 'Thêm lời chứng thực thành công',
            'alert-type' => 'success'
      );

      return redirect()->route('all.testimonials')->with($notification);

    }//end method

    public function EditTestimonials($id) {
        $testimonials = Testimonial::findOrFail($id);
        return view('backend.testimonial.edit_testimonials',compact('testimonials'));
    }//end method

    public function UpdateTestimonials(Request $request) {
        $test_id = $request->id;

        if($request->file('image')) {
            if($request->file('image')) {
                $image_it = $request->file('image')->getClientOriginalName();
                $path = $request->file('image')->storeAs('public/testimonial', $image_it);
            }
    
            Testimonial::findOrFail($test_id)->update([
                'name' => $request->name,
                'position' => $request->position,
                'message' => $request->message,
                'image' => $image_it,
            ]);
    
            $notification = array(
                'message' => 'Sửa thành công',
                'alert-type' => 'success'
          );
    
          return redirect()->route('all.testimonials')->with($notification);

        }else{
            Testimonial::findOrFail($test_id)->update([
                'name' => $request->name,
            ]);
    
            $notification = array(
                'message' => 'Sửa tên thành phố thành công',
                'alert-type' => 'success'
          );
    
          return redirect()->route('all.testimonials')->with($notification);
        }

    }//end method
    public function DeleteTestimonials($id) {
        $test = Testimonial::findOrFail($id);

        Storage::delete('storage/testimonial'.$test->image);
        Testimonial::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Xóa thành phố thành công',
            'alert-type' => 'success'
      );

      return redirect()->back()->with($notification);
    }
}
