<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Schedule;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function Index() {
        return view('frontend.index');

    }//End method
    public function UserProfile() {
        $id = Auth::user()->id;
        $userData = User::find($id);
        return view('frontend.dashboard', compact('userData'));



    }//end method

    public function UserProfileStore(Request $request) {
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->username = $request->username;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;

        if($request->file('photo')){
            $file = $request->file('photo');
            @unlink(public_path('upload/user_images/'.$data->photo));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_images'),$filename);
            $data['photo'] = $filename;
        }
        $data->save();
        $notification = array(
              'message' => 'Cập nhập dữ liệu thành công',
              'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }//end method

    public function UserLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        $notification = array(
            'message' => 'Đăng xuất thành công',
            'alert-type' => 'success'
      );


        return redirect('/login')->with($notification);
    }
    public function UserChangePassword() {
        return view('frontend.dashboard.change_password');
    }


    public function UserPasswordUpdate(Request $request){
        //Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed'
        ]);
        if(!Hash::check($request->old_password, auth::user()->password)){
            $notification = array(
                'message' => 'Cập nhật mật khẩu mới không thành công',
                'alert-type' => 'error'
          );
  
          return back()->with($notification);
        }

        ///Update the new password

        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);
        $notification = array(
            'message' => 'Cập nhật mật khẩu mới thành công',
            'alert-type' => 'success'
      );

      return back()->with($notification);



    }//end method

    public function UserScheduleRequest() {
        $id = Auth::user()->id;
        $userData = User::find($id);

        $srequest = Schedule::where('user_id',$id)->get();
        return view('frontend.massage.schedule_request', compact('userData','srequest'));



    }//end method

    public function LiveChat() {
        $id = Auth::user()->id;
        $userData = User::find($id);
        return view('frontend.dashboard.live_chat', compact('userData'));



    }//end method


}
