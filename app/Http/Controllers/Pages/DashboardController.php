<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Participant;
use App\Program;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $peserta = Participant::count();
        /*dd($peserta);*/
        $program = Program::count();
        return view('pages.dashboard', compact('peserta', 'program'));
    }
    public function admin()
    {
        $data['list'] = ' Profile ' .  Auth::user()->name;
        $user = Auth::user();
        return view('pages.user.profile', $data, compact('user'));
    }
    public function uploud_picture(Request $request)
    {
        $request->validate([
            'image'   => '|image|mimes:jpeg,png,jpg|max:500'
        ]);
        $user_pic = \App\User::find(Auth::user()->id);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            /* @unlink(public_path('storage/app/user_pic/'.$user_pic->image) ); */
            $name = $file->getClientOriginalName();
            $filename = $name;
            $file->move(public_path('storage/app/user_pic'), $filename);
            $user_pic->image   = $filename;
        } else {
            return $request;
            $user_pic->image = '';
        }
        $user_pic->save();
        return redirect(route('dashboard.admin'))->with('success', 'You have successfully Uploud picture');
    }
}
