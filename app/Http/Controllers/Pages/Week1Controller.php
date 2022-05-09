<?php

namespace App\Http\Controllers\Pages;

use App\Grade;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Participant;
use App\Program;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Week1Controller extends Controller
{
    public function index()
    {
        $participant = Participant::all();
        $program = Program::all();
        $data['list'] = 'List Peserta';
        if (Auth::user()->level == 'admin') {
            $total = Grade::selectRaw('IFNULL(exam_1,0) + IFNULL(submission_1,0) + IFNULL(submission_2,0) + IFNULL(submission_3,0) as total_grade,id, program_id, exam_1, submission_1,submission_2, submission_3, participant_id')->orderby('total_grade', 'desc')->get();
        } else {
            $total = Grade::selectRaw('IFNULL(exam_1,0) + IFNULL(submission_1,0) + IFNULL(submission_2,0) + IFNULL(submission_3,0) as total_grade,id, program_id, exam_1, submission_1,submission_2, submission_3, participant_id')->where('participant_id', auth()->user()->participant_id)->get();
            // dd($total);
        }

        return view('pages.week1.index',  $data, compact('total', 'participant', 'program'));
    }
    // public function fetch(Request $request)
    // {
    //     if ($request->input('query')) {
    //         $query = $request->input('query');
    //         $data = DB::table('participants')->join('programs', "programs.id", "=", "participants.program_id")->where('name',  'LIKE',  '%' . $query . '%')->where('angkatan',  'LIKE',  '%' . $query . '%')->where('angkatan',  'LIKE',  '%' . $query . '%')->get();
    //         $output = '<ul class="dropdown-menu" style="display:block; position:absolute; top: 80px;
    //         left: 20px;">';
    //         foreach ($data as $row) {
    //             $output .= '<li><a href="#">' . $row->name . ' - ' . $row->angkatan . ' - ' . $row->nama_program . '</a></li>';
    //         }
    //         $output .= '</ul>';
    //         echo $output;
    //     }
    //     //  '-' . $row->angkatan . '-' . $row->nama_program . ->join('programs', "programs.id", "=", "participants.program_id")->where('nama_program',  'LIKE',  '%' . $query . '%')
    // }
    public function add()
    {
        $participant = Participant::all();
        $program = Program::all();
        $data['list'] = 'Tambah Grade Peserta';

        return view('pages.week1.add',  $data, compact('participant', 'program'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'exam1' => 'nullable|integer|between:0,100',
            'subexam1' => 'nullable|integer|between:0,100',
            'subexam2' => 'nullable|integer|between:0,100',
            'subexam3' => 'nullable|integer|between:0,100',
            'nama_peserta' => 'required|string|max:50',
        ]);
        // $db_peserta = Participant::where('name', $request->nama_peserta)->first();
        // if ($db_peserta) {
        //     $id_peserta = $db_peserta->id;
        // } else {
        //     return 'gagal peserta tidak ditemukan';
        // }
        $week1 = Grade::create([
            'participant_id' => $request->nama_peserta,
            'exam_1' => $request->exam1,
            'submission_1' => $request->subexam1,
            'submission_2' => $request->subexam2,
            'submission_3' => $request->subexam3
        ]);
        // dd($week1);
        if ($week1 == null) {
            abort(404);
        }
        return redirect(route('week1'))->with(['success' => 'Grade peserta: '  . $week1->participant->name . ' Week 1 berhasil  ditambahkan']);
    }
    public function edit($id)
    {
        $data['list'] = 'Edit Peserta';
        $total = Grade::findOrFail($id);
        $participant = Participant::all();
        $program = Program::all();
        if ($total && $program == null) {
            abort(404);
        }
        return view('pages.week1.edit', $data, compact('total', 'program', 'participant'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'exam1' => 'nullable|integer|between:0,100',
            'subexam1' => 'nullable|integer|between:0,100',
            'subexam2' => 'nullable|integer|between:0,100',
            'subexam3' => 'nullable|integer|between:0,100',
            'nama_peserta' => 'required|string|max:50',
        ]);
        try {
            $week1 = Grade::findOrFail($id);
            $week1->update([
                'participant_id' => $request->nama_peserta,
                'exam_1' => $request->exam1,
                'submission_1' => $request->subexam1,
                'submission_2' => $request->subexam2,
                'submission_3' => $request->subexam3
            ]);
            if ($week1 == null) {
                abort(404);
            }
            return redirect(route('week1'))->with(['success' => 'Grade peserta' . $week1->participant->name . 'berhasil diupdate']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
    public function delete($id)
    {
        $week1 = Grade::findOrFail($id);
        $week1->delete();
        if ($week1 == null) {
            abort(404);
        }
        return redirect(route('week1'))->with(['success' =>  'List grade : ' . $week1->participant->name . ' berhasil dihapus']);
    }
}
