<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Imports\UserImport;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function index()
    {
        $data['list'] = 'List User';
        $users = User::orderBy('id', 'desc')->get();
        return view('pages.user.index', $data, compact('users'));
    }

    public function edit($id)
    {
        $data['list'] = 'Edit User';
        $users = User::findOrFail($id);
        if ($users  == null) {
            abort(404);
        }
        return view('pages.user.edit', $data, compact('users'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'password' => 'required|string|min:6'
        ]);
        $user = User::findOrFail($id);
        if ($request->password) {
            $user->password = Hash::make($request->password);
        } else {
            $user->password = $user->password;
        }
        $user->save();

        return redirect(route('user'))->with('success', 'Password change succesfully');
    }
    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        if ($user == null) {
            abort(404);
        }
        return redirect(route('user'))->with(['success' =>  'List user : ' . $user->participant->name . ' berhasil dihapus']);
    }
    public function import(Request $request)
    {
        $this->validate($request, [
            'file'  => 'required|mimes:csv,xls,xlsx'
        ]);
        if ($request->hasFile('file')) {
            $file = $request->file('file'); //GET FILE
            $nama_file = rand() . '-' . $file->getClientOriginalName(); //create unik filename
            $path = $file->move('excel', $nama_file); //uploud to folder excel
            $import = Excel::import(new UserImport, public_path('/excel/' . $nama_file)); //IMPORT FILE
            return redirect()->back()->with(['success' => 'Data Berhasil Diimport!']);
        }
        return redirect()->back()->with(['error' => 'Data Gagal Diimport!']);
    }
}
