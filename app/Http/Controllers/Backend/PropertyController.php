<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Facility;
use App\Models\Amenities;
use App\Models\MultiImage;
use App\Models\PropertyType;
use App\Models\State;
use App\Models\User;
use Intervention\Image\Facades\Image;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use App\Models\PackagePlan;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\PropertyMessage;

class PropertyController extends Controller
{
     public function AllProperty() {
        $property = Property::latest()->get();
        return view('backend.property.all_property',compact('property'));

     }
     public function AddProperty() {
          $propertytype = PropertyType::latest()->get();
          $pstate = State::latest()->get();
          $amenities = Amenities::latest()->get();
          $activeAgent = User::where('status','active')->where('role','agent')->latest()->get();

          return view('backend.property.add_property', compact('propertytype','amenities','activeAgent','pstate'));
     }//end method

     public function StoreProperty(Request $request) {
          $amen = $request->amenities_id;
          $amenites = implode(",",$amen);

          $pcode = IdGenerator::generate(['table'=>'properties','field' => 'property_code','length' => 5, 'prefix' => 'PC']);


           if($request->file('property_thambnail')) {
               $image = $request->file('property_thambnail')->getClientOriginalName();
               $path = $request->file('property_thambnail')->storeAs('public/image', $image);
           }
          // $image = $request->file('property_thambnail');
          // $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
          // Image::make($image)->resize(370, 250)->save('upload/property/thambnail'.$name_gen);
          // $save_url = 'upload/property/thambnail'.$name_gen;

            $property_id = Property::insertGetId([

               'ptype_id' => $request->ptype_id,
               'amenities_id' => $amenites,
               'property_name' => $request->property_name,
               'propety_slug' => strtolower(str_replace(' ', '-', $request->property_name)),
               'property_code' => $pcode,
               'property_status' => $request->property_status,
               'lowest_price' => $request->lowest_price,
               'max_price' => $request->max_price,

               'short_descp' => $request->short_descp,
               'long_descp' => $request->long_descp,
               'bedrooms' => $request->bedrooms,
               'bathrooms' => $request->bathrooms,
               'garage' => $request->garage,
               'garage_size' => $request->garage_size,

               'property_size' => $request->property_size,
               'amenitis_video' => $request->amenitis_video,
               'address' => $request->address,
               'city' => $request->city,
               'state' => $request->state,
               'postal_code' => $request->postal_code,

               'neighborhood' => $request->neighborhood,
               'latitude' => $request->latitude,
               'longitude' => $request->longitude,
               'featured' => $request->featured,
               'hot' => $request->hot,
               'agent_id' => $request->agent_id,
               'status' => 1,
               'property_thambnail' => $image,
               'created_at' => Carbon::now(),

          ]);
     
          foreach($request->multi_img as $img) {
               if($request->file('multi_img')) {
                    $imageName = $img->getClientOriginalName();
                    $uploadPath = $img->storeAs('public/image', $imageName);
                }
               MultiImage::insert([
                    'property_id' => $property_id,
                    'photo_name' => $imageName,

                ]);
          }
          // end Multiple image Upload From here//

          // Facilities add From here//

          $facilities = Count($request->facility_name);
          if($facilities != NULL) {
               for($i = 0; $i < $facilities; $i++ ){
                    $fcount = new Facility();
                    $fcount->property_id = $property_id;
                    $fcount->facility_name = $request->facility_name[$i];
                    $fcount->distance = $request->distance[$i];
                    $fcount->save();

               }
          }
          $notification = array(
               'message' => 'Thêm tài sản thành công',
               'alert-type' => 'success'
         );
 
         return redirect()->route('all.property')->with($notification);



          // end Facilities//


     }//end method

     public function EditProperty($id) {


          $facilities = Facility::where('property_id',$id)->get();
          $property = Property::findOrFail($id);

          $pstate = State::latest()->get();

          $type = $property->amenities_id;
          $property_ami = explode(',',$type);

          $multiImage = MultiImage::where('property_id',$id)->get();



          $propertytype = PropertyType::latest()->get();
          $amenities = Amenities::latest()->get();
          $activeAgent = User::where('status','active')->where('role','agent')->latest()->get();

          return view('backend.property.edit_property', compact('property','propertytype',
          'amenities','activeAgent','property_ami','multiImage','facilities','pstate'));

     }

     public function UpdateProperty(Request $request) {
          $amen = $request->amenities_id;
          $amenites = implode(",",$amen);

          $property_id = $request->id;
          Property::findOrFail($property_id)->update([

          
          'ptype_id' => $request->ptype_id,
          'amenities_id' => $amenites,
          'property_name' => $request->property_name,
          'propety_slug' => strtolower(str_replace(' ', '-', $request->property_name)),
          'property_status' => $request->property_status,
          'lowest_price' => $request->lowest_price,
          'max_price' => $request->max_price,

          'short_descp' => $request->short_descp,
          'long_descp' => $request->long_descp,
          'bedrooms' => $request->bedrooms,
          'bathrooms' => $request->bathrooms,
          'garage' => $request->garage,
          'garage_size' => $request->garage_size,

          'property_size' => $request->property_size,
          'amenitis_video' => $request->amenitis_video,
          'address' => $request->address,
          'city' => $request->city,
          'state' => $request->state,
          'postal_code' => $request->postal_code,

          'neighborhood' => $request->neighborhood,
          'latitude' => $request->latitude,
          'longitude' => $request->longitude,
          'featured' => $request->featured,
          'hot' => $request->hot,
          'agent_id' => $request->agent_id,
          'updated_at' => Carbon::now(),

          ]);
          $notification = array(
               'message' => 'Sửa tài sản thành công',
               'alert-type' => 'success'
         );
         return redirect()->route('all.property')->with($notification);


           
     }

     public function UpdatePropertyThumbnail(Request $request) {

          $pro_id = $request->id;
          $oldImage = $request->old_img;

          if($request->file('property_thambnail')) {
               $image = $request->file('property_thambnail')->getClientOriginalName();
               $path = $request->file('property_thambnail')->storeAs('public/image', $image);
           
           if(file_exists($oldImage)){
               Storage::delete('storage/image/'.$oldImage);
           }
           Property::findOrFail($pro_id)->update([
               'property_thambnail' => $image,
               'updated_at' => Carbon::now(),
           ]);
          }
           $notification = array(
               'message' => 'Sửa ảnh đại diện tài sản thành công',
               'alert-type' => 'success'
         );
         return redirect()->back()->with($notification);



     }//end method
     public function UpdatePropertyMultiimage(Request $request) {


          $imgs = $request->multi_img;

          foreach($imgs as $id => $img) {

               $imgDel = MultiImage::findOrFail($id);
               Storage::delete('storage/image/'.$imgDel->photo_name);

               if($request->file('multi_img')) {
                    $imageName = $img->getClientOriginalName();
                    $uploadPath = $img->storeAs('public/image', $imageName);

                    MultiImage::where('id',$id)->update([

                         'photo_name' => $imageName,
                    ]);

               }//end foreach
               $notification = array(
                    'message' => 'Sửa album ảnh tài sản thành công',
                    'alert-type' => 'success'
              );
              return redirect()->back()->with($notification);
          }
            
     }//end method

     public function PropertyMultiImage($id) {
          $oldImg = MultiImage::findOrFail($id);
          Storage::delete('storage/image/'.$oldImg->photo_name);
          $oldImg->delete();
          

          $notification = array(
               'message' => 'Xóa thành công',
               'alert-type' => 'success'
         );
         return redirect()->back()->with($notification);
     }//end method

     public function StoreNewMultiimage(Request $request) {

          $new_multi = $request->imageid;

         

               if($request->file('multi_img')) {
                    $imageName = $request->multi_img->getClientOriginalName();
                    $uploadPath = $request->multi_img->storeAs('public/image', $imageName);
                    MultiImage::insert([
                         'property_id' => $new_multi,
                         'photo_name' => $imageName,
                         'created_at' => Carbon::now(),
                    ]);
               }
           
          $notification = array(
               'message' => 'Thêm ảnh tài sản thành công',
               'alert-type' => 'success'
         );
         return redirect()->back()->with($notification);

     }//end method

     public function UpdatePropertyFacilities(Request $request) {
          $pid = $request->id;
          if($request->facility_name == NULL) {

               return redirect()->back();

          }else{
               Facility::where('property_id',$pid)->delete();
               $facilities = Count($request->facility_name);
                    for($i = 0; $i < $facilities; $i++ ){
                         $fcount = new Facility();
                         $fcount->property_id = $pid;
                         $fcount->facility_name = $request->facility_name[$i];
                         $fcount->distance = $request->distance[$i];
                         $fcount->save();
     
                    }//end for
          }
          $notification = array(
               'message' => 'Sửa điểm gần thành công',
               'alert-type' => 'success'
         );
         return redirect()->back()->with($notification);



        
     }//end method
     public function DeleteProperty($id) {

           $property = Property::findOrFail($id);
          Storage::delete('storage/image'.$property->property_thambnail);
       
           Property::findOrFail($id)->delete();

           $image = MultiImage::where('property_id',$id)->get();
           foreach($image as $img){
               Storage::delete('storage/image'.$img->photo_name);
               MultiImage::where('property_id',$id)->delete();
           }

           $facilitiesData = Facility::where('property_id',$id)->get();
           foreach($facilitiesData as $item){
               $item->facility_name;
               Facility::where('property_id',$id)->delete();

           }
           $notification = array(
               'message' => 'Xóa tài sản thành công',
               'alert-type' => 'success'
         );
         return redirect()->back()->with($notification);

     }//end method

     public function DetailsProperty($id) {


          $facilities = Facility::where('property_id',$id)->get();
          $property = Property::findOrFail($id);
          $type = $property->amenities_id;
          $property_ami = explode(',',$type);

          $multiImage = MultiImage::where('property_id',$id)->get();



          $propertytype = PropertyType::latest()->get();
          $amenities = Amenities::latest()->get();
          $activeAgent = User::where('status','active')->where('role','agent')->latest()->get();

          return view('backend.property.details_property', compact('property','propertytype',
          'amenities','activeAgent','property_ami','multiImage','facilities'));

     }//end method
     public function InactiveProperty(Request $request) {
          $pid = $request->id;
          Property::findOrFail($pid)->update([
               'status' => 0,
          ]);
          $notification = array(
               'message' => 'Ngưng kích hoạt thành công',
               'alert-type' => 'success'
         );
         return redirect()->route('all.property')->with($notification);
          

     }//end method
     public function ActiveProperty(Request $request) {
          $pid = $request->id;
          Property::findOrFail($pid)->update([
               'status' => 1,
          ]);
          $notification = array(
               'message' => 'Kích hoạt thành công',
               'alert-type' => 'success'
         );
         return redirect()->route('all.property')->with($notification);
          

     }//end method

     public function AdminPackageHistory() {
          $packagehistory = PackagePlan::latest()->get();
          return view('backend.package.package_history', compact('packagehistory'));


     }//end method

     public function PackageInvoice($id) {

          $packagehistory = PackagePlan::where('id',$id)->first();
          $pdf = Pdf::loadView('backend.package.package_history_invoice', compact('packagehistory'))->setPaper('a4')->setOption([
               'tempDir' => public_path(),
               'chroot' => public_path(),
          ]);
          return $pdf->download('invoice.pdf');

     }

     public function AdminPropertyMessage() {
          $usermsg = PropertyMessage::latest()->get();
          return view('backend.message.all_message',compact('usermsg'));

     }//end method




    
}
