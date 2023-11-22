<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Facility;
use App\Models\Amenities;
use App\Models\MultiImage;
use App\Models\PropertyType;
use App\Models\User;
use Intervention\Image\Facades\Image;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Carbon\Carbon;



class PropertyController extends Controller
{
     public function AllProperty() {
        $property = Property::latest()->get();
        return view('backend.property.all_property',compact('property'));

     }
     public function AddProperty() {
          $propertytype = PropertyType::latest()->get();
          $amenities = Amenities::latest()->get();
          $activeAgent = User::where('status','active')->where('role','agent')->latest()->get();

          return view('backend.property.add_property', compact('propertytype','amenities','activeAgent'));
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
               'amenities_id' => $request->amenities_id,
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
               'property_thambnail' => $path,
               'created_at' => Carbon::now(),

          ]);
          // Multiple image Upload From here//

          // $images = $request->file('multi_img');
          foreach($images as $img) {

               //      $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
               // Image::make($img)->resize(770,520)->save('upload/property/multi-img'.$make_name);
               // $uploadPath = 'upload/property/multi-img'.$make_name;
                
               if($request->file('multi_img')) {
                    $make = $request->file('multi_img')->getClientOriginalName();
                    $uploadPath = $request->file('multi_img')->storeAs('public/mutiti', $images);
                }
               MultiImage::insert([
                    'property_id' => $property_id,
                    'photo_name' => $uploadPath,
                    'created_at' => Carbon::now(),

                ]);
          }//end foreach
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
 
         return redirect()->routr('all.property')->with($notification);



          // end Facilities//


     }//end method

}
