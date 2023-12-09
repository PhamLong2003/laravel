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
use App\Models\Wishlish;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class WishlishController extends Controller
{
    public function addToWishList(Request $request, $property_id ) {


        if(Auth::check()){
            $exists = Wishlish::where('user_id',Auth::id())->where('property_id',$property_id)->first();

            if(!$exists){
                Wishlish::insert([
                    'user_id' => Auth::id(),
                    'property_id' => $property_id,
                    'created_at' => Carbon::now()
                ]);
                return response()->json(['success' => 'Thêm vào danh sách yêu thích thành công']);
            }
            else {
                return response()->json(['error' => 'Tài sản này đã có trong danh sách yêu thích của bạn']);

            }
        }else {
            return response()->json(['error' => 'Vui lòng đăng nhập trước']);

        }

    }//end method
    public function UserWishlist() {
        $id = Auth::user()->id;
        $userData = User::find($id);
         
        return view('frontend.dashboard.wishlist',compact('userData'));



    }//end method
    public function GetWishlistProperty() {
        $wishlist = Wishlist::with('property')->where('user_id',Auth::id())->latest()->get();
        $wishQty = wishlist::count();

        return response()->json(['wishlist' => $wishlist, 'wishQty' => $wishQty]);


    }//end method
}
