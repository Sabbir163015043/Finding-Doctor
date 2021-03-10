<?php

namespace App\Http\Controllers\frontend;

use App\Doctortype;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctortypeController extends Controller
{
    public function index(){
        if(Auth::user()->role == "admin"){
        return view('front_end.doctortypes.index',[
            'categories' => Doctortype::all(),
        ]);
        }
        else {
            return view('unauthorize');
        }
    }

    public function store(Request $request){
        if(Auth::user()->role == "admin") {
        $rules = [
            'name' => 'required|unique:doctortypes',
        ];

        $this->validate($request, $rules);

        $type = new Doctortype();
        $type->name = $request->get('name');
        $type->status = '1';
        if($type->save())
        {
            return redirect()->back()->withInput()->with('success', 'Data Added successfully');
        }
        return redirect()->back()->withInput()->with('failed', ' failed on Added');
        }
        else {
            return view('unauthorize');
        }
    }

    public function destroy($id){
        if(Auth::user()->role == "admin") {
        $type = Doctortype::findOrFail($id);

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
