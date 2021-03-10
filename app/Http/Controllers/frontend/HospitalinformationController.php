<?php

namespace App\Http\Controllers\frontend;

use App\Category;
use App\City;
use App\Doctortype;
use App\Hospitalinformation;
use App\Http\Controllers\Controller;
use App\Utlity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HospitalinformationController extends Controller
{

    public function index(){
        if(Auth::user()->role == "admin"){
            return view('front_end.hospital_doctor.index',[
                'cities' => City::all(),
                'doctortypes' => Doctortype::all(),
            ]);
        }
        else {
            return view('unauthorize');
        }

    }

    public function store(Request $request){
        if(Auth::user()->role == "admin") {
            $rules = [
                'city' => 'required',
                'category' => 'required',
                'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4048',
            ];

            $this->validate($request, $rules);

            //upload photo
            if ($request->hasFile('img')) {
                $path = Utlity::file_upload($request, 'img', 'doctor&hospital_Photo');
            } else {
                $path = null;
            }

            $info = new Hospitalinformation();
            $info->city_id = $request->get('city');
            $info->category = $request->get('category');
            $info->hospital_name = $request->get('hospital_name');
            $info->doctor_name = $request->get('doctor_name');
            $info->designation = $request->get('doctor_designation');
            $info->doctortype_id = $request->get('doctortype');
            $info->doctor_details = $request->get('doctor_details');
            $info->hospital_details = $request->get('hospital_details');
            $info->image = $path;
            $info->status = "1";
            if ($info->save()) {
                return redirect()->back()->withInput()->with('success', 'Data Added successfully');
            }
            return redirect()->back()->withInput()->with('failed', ' failed on Added');
        }
        else {
                return view('unauthorize');
            }


    }

    public function show(){
        if(Auth::user()->role == "admin") {
        return view('front_end.hospital_doctor.view',[
            'hospitals' => Hospitalinformation::all(),
        ]);
        }
        else {
            return view('unauthorize');
        }


    }
    public function destroy($id){
        if(Auth::user()->role == "admin") {
            $type = Hospitalinformation::findOrFail($id);
            if ($type->delete()) {
                return redirect()->back()->withInput()->with('success', 'Data Delete successfully');
            }
            return redirect()->back()->withInput()->with('failed', ' failed on deleting');
        }
        else {
            return view('unauthorize');
        }
    }
}
