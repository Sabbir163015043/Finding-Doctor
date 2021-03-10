<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\User;
use App\Utlity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index($id){
        $users = User::where('id',Auth::user()->id)->first();
       return view('front_end.profile.profile',[
           'user' => $users,
       ]);

    }

    public function update(Request $request, $id){
        $rules = [
            'name' => 'required',
            'phone' => 'required',
            'img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4048',
        ];
        $this->validate($request, $rules);

        $user = User::find($id);
        $user->name = $request->get('name');
        $user->phone = $request->get('phone');
        $user->image = null;
        if($request->hasFile('img')){
            if($user->image){
                unlink($user->image);
            }
            $path = Utlity::file_upload($request,'img','user_photo');
            $user->image = $path;
        }
        if($user->save())
        {
            return redirect()->back()->withInput()->with('success', 'Data Update successfully');
        }
        return redirect()->back()->withInput()->with('failed', ' failed on Update');
    }

    //change password

    public function changePassword(Request $request){
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("failed","Your current password does not matches with the password you provided. Please try again.");
        }
        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("failed","New Password cannot be same as your current password. Please choose a different password.");
        }

        $this->validate($request, [
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);
        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();
        return redirect()->back()->with("success","Password changed successfully !");
    }
}
