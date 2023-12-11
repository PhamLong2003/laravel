<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Facility;
use App\Models\Amenities;
use App\Models\MultiImage;
use App\Models\PropertyType;
use App\Models\User;
use App\Models\Compare;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CompareController extends Controller
{
    public function addToCompare(Request $request, $property_id ) {


        if(Auth::check()){
            $exists = Compare::where('user_id',Auth::id())->where('property_id',$property_id)->first();

            if(!$exists){
                Compare::insert([
                    'user_id' => Auth::id(),
                    'property_id' => $property_id,
                    'created_at' => Carbon::now()
                ]);
                return response()->json(['success' => 'Thêm vào danh sách so sánh thành công']);
            }
            else {
                return response()->json(['error' => 'Tài sản này đã có trong danh sách so sánh của bạn']);

            }
        }else {
            return response()->json(['error' => 'Vui lòng đăng nhập trước']);

        }

    }//end method

    public function UserCompare() {
         
        return view('frontend.dashboard.compare');

    }//end method

    public function GetCompareProperty() {
        $compare = Compare::with('property')->where('user_id',Auth::id())->latest()->get();

        return response()->json($compare);


    }//end method

    
    public function CompareRemove($id) {
        Compare::where('user_id',Auth::id())->where('id',$id)->delete();
        return response()->json(['success' => 'Xóa thành công']);

    }//end method
}
