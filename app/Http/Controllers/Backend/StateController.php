<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PropertyType;
use App\Models\State;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;



class StateController extends Controller
{
    public function AllState() {
        $state = State::latest()->get();
        return view('backend.state.all_state',compact('state'));

    }//end method

    public function AddState() {
        return view('backend.state.add_state');
    }//end method


    public function StoreState(Request $request) {

        if($request->file('state_image')) {
            $image = $request->file('state_image')->getClientOriginalName();
            $path = $request->file('state_image')->storeAs('public/state', $image);
        }

        State::insert([
            'state_name' => $request->state_name,
            'state_image' => $image,
        ]);

        $notification = array(
            'message' => 'Thêm thành phố thành công',
            'alert-type' => 'success'
      );

      return redirect()->route('all.state')->with($notification);

    }//end method

    public function EditState($id) {
        $state = State::findOrFail($id);
        return view('backend.state.edit_state',compact('state'));
    }//end method

    public function UpdateState(Request $request) {
        $state_id = $request->id;
        if($request->file('state_image')) {
            if($request->file('state_image')) {
                $image = $request->file('state_image')->getClientOriginalName();
                $path = $request->file('state_image')->storeAs('public/state', $image);
            }
    
            State::findOrFail($state_id)->update([
                'state_name' => $request->state_name,
                'state_image' => $image,
            ]);
    
            $notification = array(
                'message' => 'Sửa thành phố thành công',
                'alert-type' => 'success'
          );
    
          return redirect()->route('all.state')->with($notification);

        }else{
            State::findOrFail($state_id)->update([
                'state_name' => $request->state_name,
            ]);
    
            $notification = array(
                'message' => 'Sửa tên thành phố thành công',
                'alert-type' => 'success'
          );
    
          return redirect()->route('all.state')->with($notification);
        }

    }//end method

    public function DeleteState($id) {
        $state = State::findOrFail($id);

        Storage::delete('storage/state'.$state->state_image);
        State::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Xóa thành phố thành công',
            'alert-type' => 'success'
      );

      return redirect()->back()->with($notification);
    }

}

