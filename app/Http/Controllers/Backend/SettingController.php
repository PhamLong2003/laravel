<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SmtpSetting;
use App\Models\SiteSetting;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;


class SettingController extends Controller
{
    public function SmtpSetting() {
        $setting = SmtpSetting::find(1);
        return view('backend.setting.smpt_update',compact('setting'));

    }//end method

    public function UpdateSmptSetting(Request $request) {
        $smpt_id = $request->id;
        SmtpSetting::findOrFail($smpt_id)->update([
            'mailer' => $request->mailer,
            'host' => $request->host,
            'post' => $request->post,
            'username' => $request->username,
            'password' => $request->password,
            'encryption' => $request->encryption,
            'from_address' => $request->from_address,

        ]);

        $notification = array(
            'message' => 'Cập nhật SMTP thành công',
            'alert-type' => 'success'
      );

      return redirect()->back()->with($notification);

    }//end method

    public function SiteSetting() {

        $sitesetting = SiteSetting::find(1);
        return view('backend.setting.site_update',compact('sitesetting'));

    }//end method
    public function UpdateSiteSetting(Request $request){

        $site_id = $request->id;
        if($request->file('logo')) {
            if($request->file('logo')) {
                $image = $request->file('logo')->getClientOriginalName();
                $path = $request->file('logo')->storeAs('public/site', $image);
            }
    
            SiteSetting::findOrFail($site_id)->update([
                'support_phone' => $request->support_phone,
                'company_address' => $request->company_address,
                'email' => $request->email,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'copyright' => $request->copyright,
                'logo' => $image,
            ]);
    
            $notification = array(
                'message' => 'Cập nhật trang web thành công',
                'alert-type' => 'success'
          );
    
          return redirect()->back()->with($notification);

        }else{
            SiteSetting::findOrFail($site_id)->update([
                'support_phone' => $request->support_phone,
                'company_address' => $request->company_address,
                'email' => $request->email,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'copyright' => $request->copyright,
            ]);
    
            $notification = array(
                'message' => 'Cập nhật trang web thành công',
                'alert-type' => 'success'
          );
    
          return redirect()->back()->with($notification);
        }


    }//end method

}
