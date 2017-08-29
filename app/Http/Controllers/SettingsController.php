<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SettingsController extends Controller
{
    protected function show()
    {
        return view('setting.restPassword');
    }

    protected function passwordUpdate(Request $request)
    {
        $this->validate($request,['currentPass'=> 'required','newPassword' => 'required|min:6|confirmed']);
        $user = User::where('id', Auth::user()->id)->first();

        if (Hash::check($request->input('currentPass') == $user->password))
        {
            if($request->input('currentPass') == $request->input('newPassword'))
                return back()->with('warning','Your Current And New Password Are Same');

            $user->password = bcrypt($request->input('newPassword'));
            $user->save();
            return back()->with('success','Your Password are successfully changed');
        }
        return back()->with('warning','Password Are Not Match');
    }
}
