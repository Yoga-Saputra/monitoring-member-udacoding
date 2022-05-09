<?php

namespace App\Http\Controllers\Pages;

use App\Exports\ParticipantExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Imports\ParticipantImport;
use Illuminate\Http\Request;
use App\Participant;
use App\Program;
use App\User;
use Maatwebsite\Excel\Validators\Failure;
use Maatwebsite\Excel\Concerns\SkipsErrors;

class ParticipantController extends Controller
{
    public function index()
    {
        $data['list'] = 'List Peserta';
        $participant = Participant::orderBy('id', 'DESC')->get();
        // limit(5)->orderBy('id', 'desc')
        $program = Program::all();
        if ($participant && $program == null) {
            abort(404);
        }
        /* $angkatan = Angkatan::all(); */
        return view('pages.participant.index', $data, compact('participant', 'program'));
    }
    public function importExcel(Request $request)
    {
        $this->validate($request, [
            'file'  => 'required|mimes:csv,xls,xlsx'
        ]);
        if ($request->hasFile('file')) {
            $file = $request->file('file'); //GET FILE
            $nama_file = rand() . '-' . $file->getClientOriginalName(); //create unik filename
            $path = $file->move('excel', $nama_file); //uploud to folder excel
            $import = Excel::import(new ParticipantImport, public_path('/excel/' . $nama_file)); //IMPORT FILE
            return redirect()->back()->with(['success' => 'Data Berhasil Diimport!']);
        }
        return redirect()->back()->with(['error' => 'Data Gagal Diimport!']);
    }
    public function exportExcel()
    {
        return Excel::download(new ParticipantExport, 'participant.xlsx');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:50',
            'email' => 'required|string|max:50',
            'no_tlp' => 'required|string|max:15',
            'sekolah' => 'required|string|max:50',
            'angkatan' => 'required|string|max:50',
            'program' => 'required|string'
            /* 'angkatan' => 'required|string' */
        ]);
        try {
            $participant = Participant::firstOrcreate([
                'name' => $request->name,
                'email' => $request->email,
                'no_tlp' => $request->no_tlp,
                'sekolah' => $request->sekolah,
                'angkatan' => $request->angkatan,
                'program_id' => $request->program
                /* 'angkatan_id' => $request->angkatan, */
            ]);
            $user = User::create([
                'name' => $participant->name,
                'email' => $participant->email,
                'level'  => 'peserta',
                'password' => bcrypt('peserta123'),
                'participant_id' => $participant->id
            ]);
            if ($participant == null) {
                abort(404);
            }
            return redirect()->back()->with(['success' => 'Peserta: '  . $participant->name . '  Ditambahkan']);
        } catch (\Exception $e) {
            //jika gagal, redirect ke form yang sama lalu membuat flash message error
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
    public function edit($id)
    {
        $data['list'] = 'Edit Peserta';
        $participant = Participant::findOrFail($id);
        $program = Program::all();
        if ($participant && $program == null) {
            abort(404);
        }
        /* $angkatan = Angkatan::all(); */
        return view('pages.participant.edit', $data, compact('participant', 'program'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:50',
            'email' => 'required|string|max:50',
            'no_tlp' => 'required|string|max:15',
            'sekolah' => 'required|string|max:50',
            'angkatan' => 'required|string|max:50',
            'program' => 'required|string'
            /* 'angkatan' => 'required|string' */
        ]);

        try {
            $participant = Participant::findOrFail($id);
            $participant->update([
                'name' => $request->name,
                'email' => $request->email,
                'no_tlp' => $request->no_tlp,
                'sekolah' => $request->sekolah,
                'angkatan' => $request->angkatan,
                'program_id' => $request->program,
                /* 'angkatan_id' => $request->angkatan, */
            ]);
            if ($participant == null) {
                abort(404);
            }
            return redirect(route('participant'))->with(['success' => 'List Peserta: '  . $participant->nama_angkatan . '  Diupdate']);
        } catch (\Exception $e) {
            //jika gagal, redirect ke form yang sama lalu membuat flash message error
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
    public function delete($id)
    {
        $participant = Participant::findOrFail($id);
        $participant->delete();
        if ($participant == null) {
            abort(404);
        }
        return redirect(route('participant'))->with(['success' =>  'List participant : ' . $participant->nama_participant . ' Dihapus']);
    }
}
