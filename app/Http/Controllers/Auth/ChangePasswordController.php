<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;




class ChangePasswordController extends Controller
{
    // public function index()
    // {
    //     $data['page_title'] = 'change password';
    //     return view('auth.passwords.change', $data);
    // }
    public function changepassword(Request $request)
    {
        if (!(Hash::check($request->get('oldpassword'), Auth::user()->password))) {
            return redirect(route('dashboard.admin'))->with('error', 'Your Current password does not match with what you provide');
        }
        if (strcmp($request->get('oldpassword'), $request->get('new_password')) == 0) {
            return redirect(route('dashboard.admin'))->with('error', 'Your current password cannot be same with the new password');
        }
        $validator = Validator::make($request->all(), [
            'oldpassword' => 'required',
            'new_password'    => 'required|string|min:6',
            'password_confirmation' => 'required|same:new_password'
        ]);
        if ($validator->fails()) {
            return redirect(route('dashboard.admin'))->withErrors($validator);
        } else {
            $user = User::find(Auth::user()->id);
            $user->password = bcrypt($request->get('new_password'));
            $user->save();
            return redirect(route('dashboard.admin'))->with('success', 'Password change succesfully');
        }
    }
}
