<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Testingtype;
use App\User;
use App\Userinformation;
use App\Utlity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserinformationController extends Controller
{
    public function index(){
        return view('front_end.user_data.index',[
            'types'=> Testingtype::all(),
            'userinfos'=> Userinformation::where('user_id',Auth::user()->id)->get(),
            'users'  => User::where('id','<>',Auth::user()->id)->get()
        ]);
    }

    public function store(Request $request){
        $rules = [
            'doctor_name' => 'required',
            'doctor_designation' => 'required',
            'hospital_name' => 'required',
            'test_type' => 'required',
            'date_type' => 'required',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4048',
        ];
        $this->validate($request, $rules);
        //upload photo
        if ($request->hasFile('img')){
            $path = Utlity::file_upload($request,'img','Test_Photo');
        }
        else {
            $path = null;
        }

        $userdata = new Userinformation();
        $userdata->user_id        = Auth::user()->id;
        $userdata->testingtype_id = $request->get('test_type');
        $userdata->doctor_name = $request->get('doctor_name');
        $userdata->designation = $request->get('doctor_designation');
        $userdata->hospital_name = $request->get('hospital_name');
        $userdata->prescription_date = $request->get('date_type');
        $userdata->image = $path;
        $userdata->status = '1';
        if($userdata->save())
        {
            return redirect()->back()->withInput()->with('success', 'Data Added successfully');
        }
        return redirect()->back()->withInput()->with('failed', ' failed on Added');
    }

    public function destroy($id)
    {
        $userdata = Userinformation::findOrFail($id);
        if ($userdata->image) {
            unlink($userdata->image);
        }

        if ($userdata->delete()) {
            return redirect()->back()->withInput()->with('success', 'Data Delete successfully');
        }
        return redirect()->back()->withInput()->with('failed', ' failed on deleting');
    }

}
