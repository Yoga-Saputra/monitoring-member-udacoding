<?php

namespace App\Http\Controllers\Pages;

use App\Grade;
use App\Http\Controllers\Controller;
use App\Participant;
use App\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Week7Controller extends Controller
{
    public function index()
    {
        $participant = Participant::all();
        $program = Program::all();
        $data['list'] = 'List Peserta';
        if (Auth::user()->level == 'admin') {
            $total = Grade::selectRaw('IFNULL(exam_7,0) + IFNULL(submission_19,0) + IFNULL(submission_20,0) + IFNULL(submission_21,0) as total_grade,id, program_id, exam_7, submission_19, submission_20, submission_21, id, participant_id')->groupby('program_id', 'exam_7', 'submission_19', 'submission_20', 'submission_21', 'id', 'participant_id')->orderby('total_grade', 'desc')->get();
        } else {
            $total = Grade::selectRaw('IFNULL(exam_7,0) + IFNULL(submission_19,0) + IFNULL(submission_20,0) + IFNULL(submission_21,0) as total_grade,id, program_id, exam_7, submission_19, submission_20, submission_21, id, participant_id')->groupby('program_id', 'exam_7', 'submission_19', 'submission_20', 'submission_21', 'id', 'participant_id')->orderby('total_grade', 'desc')->where('participant_id', auth()->user()->participant_id)->get();
        }

        /* dd($total); */
        return view('pages.week7.index',  $data, compact('total', 'participant', 'program'));
    }
    /* public function store(Request $request)
    {
        $this->validate($request, [
            'exam7' => 'nullable|integer|between:0,100',
            'subexam8' => 'nullable|integer|between:0,100',
            'subexam9' => 'nullable|integer|between:0,100',
            'subexam19' => 'nullable|integer|between:0,100',
            'nama_peserta' => 'required|string|max:50',
        ]);
        try {
            $week7 = Grade::firstOrcreate([
                'participant_id' => $request->nama_peserta,
                'exam_7' => $request->exam7,
                'submission_8' => $request->subexam8,
                'submission_9' => $request->subexam9,
                'submission_19' => $request->subexam19
            ]20
            i21$week7 == null){
                abort(404);
            }
            return redirect()->back()->with(['success' => 'Grade peserta: '  . $week7->participant->name . ' Week 4 berhasil  ditambahkan']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    } */
    public function edit($id)
    {
        $data['list'] = 'Edit Peserta';
        $total = Grade::findOrFail($id);
        $participant = Participant::all();
        $program = Program::all();
        if ($total && $program == null) {
            abort(404);
        }
        return view('pages.week7.edit', $data, compact('total', 'program', 'participant'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'exam7' => 'nullable|integer|between:0,100',
            'subexam19' => 'nullable|integer|between:0,100',
            'subexam20' => 'nullable|integer|between:0,100',
            'subexam21' => 'nullable|integer|between:0,100',
            'nama_peserta' => 'required|string|max:50',
        ]);
        try {
            $week7 = Grade::findOrFail($id);
            $week7->update([
                'participant_id' => $request->nama_peserta,
                'exam_7' => $request->exam7,
                'submission_19' => $request->subexam19,
                'submission_20' => $request->subexam20,
                'submission_21' => $request->subexam21
            ]);
            if ($week7 == null) {
                abort(404);
            }
            return redirect(route('week7'))->with(['success' => 'Grade peserta : ' . $week7->participant->name . ' berhasil diupdate']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
    /* public function delete($id)
    {
        $week7 = Grade::findOrFail($id);
        $week7->delete();
        if($week7 == null){
            abort(404);
        }
        return redirect(route('week7'))->with(['success' =>  'List grade : ' .$week7->participant->name. ' berhasil dihapus' ]);
    } */
}
