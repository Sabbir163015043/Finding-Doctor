<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Testingtype;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class PrescriptionController extends Controller
{
    public function index(){
        if(Auth::user()->role == "admin"){
        return view('front_end.prescription_category.index',[
            'types' => Testingtype::all(),
        ]);
        }
        else {
            return view('unauthorize');
        }
    }

    public function store(Request $request){
        if(Auth::user()->role == "admin") {
        $rules = [
            'name' => 'required|unique:testingtypes',
        ];

        $this->validate($request, $rules);

        $type = new Testingtype();
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
        $type = Testingtype::findOrFail($id);


        if ($type->delete()) {
            return redirect()->back()->withInput()->with('success', 'Data Delete successfully');
        }
        return redirect()->back()->withInput()->with('failed', ' failed on deleting');
    }


}
