<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PropertyType;
use App\Models\Amenities;


class PropertyTypeController extends Controller
{
    public function Alltype() {
        $types = PropertyType::latest()->get();
        return view('backend.type.all_type',compact('types'));

    }//end method

    public function Addtype() {
        return view('backend.type.add_type');
    }//end method

    public function Storetype(Request $request) {
        $request->validate([
            'type_name' => 'required|unique:property_types|max:200',
            'type_icon' => 'required'
        ]);
        PropertyType::insert ([
            'type_name' => $request->type_name,
            'type_icon' => $request->type_icon,
        ]);
        $notification = array(
            'message' => 'Them thành công',
            'alert-type' => 'success'
      );
      return redirect()->route('all.type')->with($notification);
    }//end method

        public function Edittype($id) {
            $types = PropertyType::findOrFail($id);
            return view('backend.type.edit_type',compact('types'));

        }

        public function UpdateType(Request $request) {

             $pid = $request->id;

            PropertyType::findOrFail($pid)->update([
                'type_name' => $request->type_name,
                'type_icon' => $request->type_icon,
            ]);
            $notification = array(
                'message' => 'Cập nhật thành công',
                'alert-type' => 'success'
          );
          return redirect()->route('all.type')->with($notification);
        }//end method

        public function Deletetype($id) {
            PropertyType::findOrFail($id)->delete();
            $notification = array(
                'message' => 'Xóa thành công',
                'alert-type' => 'success'
          );
          return redirect()->back()->with($notification);

        }
        ////////////Amenities All Method//////////////////
    
        public function AllAmenitie() {
            $amenities = Amenities::latest()->get();
            return view('backend.amenities.all_amenities',compact('amenities'));
    
        }//end method

        public function AddAmenitie() {
            return view('backend.amenities.add_amenities');

        }//end method

        public function Storeamenitie(Request $request) {
           
            Amenities::insert ([
                'amenitis_name' => $request->amenitis_name,
            ]);
            $notification = array(
                'message' => 'Thêm tiện ích thành công',
                'alert-type' => 'success'
          );
          return redirect()->route('all.amenitie')->with($notification);
        }//end method

        public function EditAmenitie($id) {
            $amenities = Amenities::findOrFail($id);
            return view('backend.amenities.edit_amenities',compact('amenities'));
        }//end method

        public function UpdateAmenitie(Request $request) {
            $ame_id = $request->id;
           
            Amenities::findOrFail($ame_id)->update([
                'amenitis_name' => $request->amenitis_name,
            ]);
            $notification = array(
                'message' => 'Cập nhật tiện ích thành công',
                'alert-type' => 'success'
          );
          return redirect()->route('all.amenitie')->with($notification);
        }//end method

        public function DeleteAmenitie($id) {
            Amenities::findOrFail($id)->delete();

            $notification = array(
                            'message' => 'Xóa tiện ích thành công',
                            'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }

}


