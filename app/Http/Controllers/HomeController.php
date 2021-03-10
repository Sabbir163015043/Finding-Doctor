<?php

namespace App\Http\Controllers;

use App\Hospitalinformation;
use App\Userinformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home',[
            'mydata' => Userinformation::where('user_id',Auth::user()->id)->count(),
            'receive' => Userinformation::where('user_id',Auth::user()->id)->count(),
            'hospital' => Hospitalinformation::where('category','hospital')->count(),
            'doctor' => Hospitalinformation::where('category','doctor')->count(),
        ]);
    }
}
