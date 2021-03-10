<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Testingtype;
use App\User;
use App\Userinformation;
use App\UserUserinformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SenditemController extends Controller
{
    public function index(){
        return view('front_end.user_data.receiveitem',[
        'types'=> Testingtype::all(),
            'infos'  => UserUserinformation::where('user_id',Auth::user()->id)->with('userinformation')->get(),
        ]);

    }

    public function store(Request $request){
        $rules = [
            'user' => 'required|unique:user_userinformations,user_id',
        ];
        $this->validate($request, $rules);

        $senditem = new UserUserinformation();
        $senditem->user_id = $request->get('user');
        $senditem->userinformation_id = $request->get('send_item');
        $senditem->send_by = $request->get('sender');
        if($senditem->save())
        {
            return redirect()->back()->withInput()->with('success', 'Data Send successfully');
        }
        return redirect()->back()->withInput()->with('failed', ' failed on Send');

    }

    public function destroy($id){
        $type = UserUserinformation::findOrFail($id);

        if ($type->delete()) {
            return redirect()->back()->withInput()->with('success', 'Data Delete successfully');
        }
        return redirect()->back()->withInput()->with('failed', ' failed on deleting');
    }
}
