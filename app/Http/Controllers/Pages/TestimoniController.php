<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Participant;
use App\Program;
use App\Testimoni;
use Illuminate\Http\Request;

class TestimoniController extends Controller
{
    public function index()
    {
        $participant = Participant::all();
        $program = Program::all();
        $data['list'] = 'List Testimoni';
        $testimoni = Testimoni::orderBy('testimoni.id', 'desc')->get();
        // dd($testimoni);
        return view('pages.testimoni.index',  $data, compact('testimoni', 'participant', 'program'));
    }
    public function add()
    {
        $participant = Participant::all();
        $program = Program::all();
        $data['list'] = 'Tambah Tesimoni';

        return view('pages.testimoni.add',  $data, compact('participant', 'program'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_peserta' => 'required|string|max:50',
            'deskripsi' => 'required|string|',
        ]);
        $testimoni = Testimoni::create([
            'participant_id' => $request->nama_peserta,
            'deskripsi' => $request->deskripsi,
        ]);
        // dd($testimoni);
        if ($testimoni == null) {
            abort(404);
        }
        return redirect(route('testimoni'))->with(['success' => 'Testimoni Peserta : '  . $testimoni->participant->name . ' berhasil  ditambahkan']);
    }
    public function edit($id)
    {
        $data['list'] = 'Edit Peserta';
        $testimoni = Testimoni::findOrFail($id);
        $participant = Participant::all();
        $program = Program::all();
        if ($testimoni && $program == null) {
            abort(404);
        }
        return view('pages.testimoni.edit', $data, compact('testimoni', 'program', 'participant'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_peserta' => 'required|string|max:50',
            'deskripsi' => 'required|string|',
        ]);
        try {
            $testimoni = Testimoni::findOrFail($id);
            $testimoni->update([
                'participant_id' => $request->nama_peserta,
                'deskripsi' => $request->deskripsi,
            ]);
            if ($testimoni == null) {
                abort(404);
            }
            return redirect(route('testimoni'))->with(['success' => 'Testimoni peserta' . $testimoni->participant->name . 'berhasil diupdate']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
    public function delete($id)
    {
        $testimoni = Testimoni::findOrFail($id);
        $testimoni->delete();
        if ($testimoni == null) {
            abort(404);
        }
        return redirect(route('testimoni'))->with(['success' =>  'List Testimoni : ' . $testimoni->participant->name . ' berhasil dihapus']);
    }
}
