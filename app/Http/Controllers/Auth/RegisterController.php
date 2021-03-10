<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Utlity;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'phone' => 'required',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4048',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'gender'=> 'required'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        //upload photo
        if (isset($data['img'])) {
            $path = Utlity::file_upload($data,'img','user_photo');
        }
        else {
            $path = null;
        }


        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'image' => $path,
            'gender' => $data['gender'],
            'status' => '1',
            'password' => Hash::make($data['password']),
        ]);
    }

//    public function store(Request $request){
//        $rules = [
//            'name' => ['required', 'string', 'max:255'],
//            'phone' => 'required',
//            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4048',
//            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
//            'password' => ['required', 'string', 'min:8', 'confirmed'],
//            'gender'=> 'required'
//        ];
//        $this->validate($request, $rules);
//        //upload photo
//        if ($request->hasFile('img')){
//            $path = Utlity::file_upload($request,'img','user_photo');
//        }
//        else {
//            $path = null;
//        }
//
//        $user = new User();
//        $user->name = $request->get('name');
//        $user->email = $request->get('email');
//        $user->phone = $request->get('phone');
//        $user->password = Hash::make($request->get('phone'));
//        $user->gender = $request->get('gender');
//        $user->status = '1';
//        $user->image            = $path;
//        if($user->save())
//        {
//            return redirect()->route('register')->with('success', 'User Registration successfully');
//        }
//        return redirect()->back()->withInput()->with('failed', 'User Registration failed on create');
//    }
}
