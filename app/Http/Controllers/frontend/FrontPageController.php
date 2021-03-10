<?php

namespace App\Http\Controllers\frontend;

use App\City;
use App\Doctortype;
use App\Hospitalinformation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontPageController extends Controller
{
    public function index(){
        return view('welcome',[
            'cities' => City::all(),
            'doctortypes' => Doctortype::all(),
        ]);
    }

    public function filter(Request $request){
        $rules =[
          'city'=>'required',
          'category'=>'required',
        ];
        $this->validate($request,$rules);

        if($request->city && $request->category){
            $filterdata = Hospitalinformation::where('city_id',$request->city)
                ->where('category',$request->category)
                ->get();

        }
         if ($request->city && $request->category && $request->doctor_type){
            $filterdata = Hospitalinformation::where('city_id',$request->city)
                ->where('category',$request->category)
                ->where('doctortype_id',$request->doctor_type)
                ->get();
        }
        return view('filter',[
            'cities' => City::all(),
            'filterdatas' => $filterdata,
            'doctortypes' => Doctortype::all(),
        ]);


    }
}