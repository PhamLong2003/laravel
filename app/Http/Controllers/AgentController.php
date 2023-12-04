<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Hash;

class AgentController extends Controller
{
    public function AgentDashboard() {
        return view('agent.index');
    }//end mehod

   public function AgentRegister(Request $request) {

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'role' => 'agent',
            'status' => 'inactive',

        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::AGENT);
        }//end mehod

        public function AgentLogout(Request $request)
        {
            Auth::guard('web')->logout();
    
            $request->session()->invalidate();
    
            $request->session()->regenerateToken();
            $notification = array(
                'message' => 'Đăng xuất thành công',
                'alert-type' => 'success'
          );
    
            return redirect('/agent/login')->with($notification);
        }//end method

        public function AgentProfile() {
            $id = Auth::user()->id;
            $profileData = User::find($id);
            return view('agent.agent_profile_view', compact('profileData'));
    
        }//end method
        public function AgentProfileStore(Request $request) {
            $id = Auth::user()->id;
            $data = User::find($id);
            $data->username = $request->username;
            $data->name = $request->name;
            $data->email = $request->email;
            $data->phone = $request->phone;
            $data->address = $request->address;
    
            if($request->file('photo')){
                $file = $request->file('photo');
                @unlink(public_path('upload/agent_images/'.$data->photo));
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('upload/agent_images'),$filename);
                $data['photo'] = $filename;
            }
            $data->save();
            $notification = array(
                  'message' => 'Cập nhập dữ liệu thành công',
                  'alert-type' => 'success'
            );
    
            return redirect()->back()->with($notification);
    
        }// end method

        public function AgentChangePassword() {
            $id = Auth::user()->id;
            $profileData = User::find($id);
            return view('agent.agent_change_password',compact('profileData'));
        }//end mothed

        public function AgentUpdatePassword(Request $request){
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
}
