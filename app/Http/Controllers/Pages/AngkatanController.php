<?php

namespace App\Http\Controllers\Pages;

use App\Angkatan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AngkatanController extends Controller
{
    public function index()
    {
        $data['list'] = 'List Angkatan';
        $angkatan = Angkatan::all();
        if($angkatan == null){
            abort(404);
        }
        return view('pages.angkatan.index', $data, compact('angkatan'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_angkatan' => 'required|string|max:50'
        ]);
        try {
            $angkatan = Angkatan::firstOrcreate([
                'nama_angkatan' => $request->nama_angkatan
            ]);
            if($angkatan == null){
                abort(404);
            }
            return redirect()->back()->with(['success' => 'Angkatan: '  . $angkatan->nama_angkatan . '  Ditambahkan']);
        } catch (\Exception $e) {
            //jika gagal, redirect ke form yang sama lalu membuat flash message error
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
    public function edit($id){
        $data['list'] = 'Edit Angkatan';
        $angkatan = Angkatan::find($id);
        if($angkatan == null){
            abort(404);
        }
        return view('pages.angkatan.edit',$data, compact('angkatan'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_angkatan' => 'required|string|max:50'
        ]);
        try {
            $angkatan = Angkatan::findOrFail($id);
            $angkatan->update([
                'nama_angkatan' => $request->nama_angkatan
            ]);
            if($angkatan == null){
                abort(404);
            }
            return redirect(route('angkatan'))->with(['success' =>  'List Angkatan : ' .$angkatan->nama_angkatan. ' Diperbaharui' ]);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
    public function delete($id)
    {
        $angkatan = Angkatan::findOrFail($id);
        $angkatan->delete();
        if($angkatan == null){
            abort(404);
        }
        return redirect(route('angkatan'))->with(['success' =>  'List angkatan : ' .$angkatan->nama_angkatan. ' Dihapus' ]);
    }
}
