<?php

namespace App\Http\Controllers\Pages;

use App\Grade;
use App\Http\Controllers\Controller;
use App\Participant;
use App\Program;
use Exception;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class ProgramController extends Controller
{
    public function index(Request $request)
    {
        // $s = Participant::orderBy('id', 'desc')->get();
        // dd($s);
        $data['list'] = 'List Program';
        $program = Program::all();
        if ($program == null) {
            abort(404);
        }
        return view('pages.program.index', $data, compact('program'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_program' => 'required|string|max:50'
        ]);
        try {
            $program = Program::firstOrcreate([
                'nama_program' => $request->nama_program
            ]);
            if ($program == null) {
                abort(404);
            }
            return redirect()->back()->with(['success' => 'Program: '  . $program->nama_program . '  Ditambahkan']);
        } catch (\Exception $e) {
            //jika gagal, redirect ke form yang sama lalu membuat flash message error
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
    public function edit($id)
    {
        $data['list'] = 'Edit Program';
        $program = Program::findOrFail($id);
        if ($program == null) {
            abort(404);
        }
        return view('pages.program.edit', $data, compact('program'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_program' => 'required|string|max:50'
        ]);
        try {
            $program = Program::findOrFail($id);
            $program->update([
                'nama_program' => $request->nama_program
            ]);
            if ($program == null) {
                abort(404);
            }
            return redirect(route('program'))->with(['success' =>  'List program : ' . $program->nama_program . ' Diperbaharui']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
    public function delete($id)
    {
        $program = Program::findOrFail($id);
        $program->delete();
        if ($program == null) {
            abort(404);
        }
        return redirect(route('program'))->with(['success' =>  'List program : ' . $program->nama_program . ' Dihapus']);
    }
}
