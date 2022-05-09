<?php

namespace App\Http\Controllers\Pages;

use App\Grade;
use App\Http\Controllers\Controller;
use App\Participant;
use App\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Week9Controller extends Controller
{
    public function index()
    {
        $participant = Participant::all();
        $program = Program::all();
        $data['list'] = 'List Peserta';
        if (Auth::user()->level == 'admin') {
            $total = Grade::selectRaw('IFNULL(exam_9,0) + IFNULL(submission_25,0) + IFNULL(submission_26,0) + IFNULL(submission_27,0) as total_grade,id, program_id, exam_9, submission_25, submission_26, submission_27, id, participant_id')->groupby('program_id', 'exam_9', 'submission_25', 'submission_26', 'submission_27', 'id', 'participant_id')->orderby('total_grade', 'desc')->get();
        } else {
            $total = Grade::selectRaw('IFNULL(exam_9,0) + IFNULL(submission_25,0) + IFNULL(submission_26,0) + IFNULL(submission_27,0) as total_grade,id, program_id, exam_9, submission_25, submission_26, submission_27, id, participant_id')->groupby('program_id', 'exam_9', 'submission_25', 'submission_26', 'submission_27', 'id', 'participant_id')->orderby('total_grade', 'desc')->where('participant_id', auth()->user()->participant_id)->get();
        }

        /* dd($total); */
        return view('pages.week9.index',  $data, compact('total', 'participant', 'program'));
    }
    /* public function store(Request $request)
    {
        $this->validate($request, [
            'exam9' => 'nullable|integer|between:0,100',
            'subexam8' => 'nullable|integer|between:0,100',
            'subexam9' => 'nullable|integer|between:0,100',
            'subexam25' => 'nullable|integer|between:0,100',
            'nama_peser26' => 'required|string|max:50',
        ]27
        try {
            $week9 = Grade::firstOrcreate([
                'participant_id' => $request->nama_peserta,
                'exam_9' => $request->exam9,
                'submission_8' => $request->subexam8,
                'submission_9' => $request->subexam9,
                'submission_25' => $request->subexam25
            ]26
            i27$week9 == null){
                abort(404);
            }
            return redirect()->back()->with(['success' => 'Grade peserta: '  . $week9->participant->name . ' Week 4 berhasil  ditambahkan']);
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
        return view('pages.week9.edit', $data, compact('total', 'program', 'participant'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'exam9' => 'nullable|integer|between:0,100',
            'subexam25' => 'nullable|integer|between:0,100',
            'subexam26' => 'nullable|integer|between:0,100',
            'subexam27' => 'nullable|integer|between:0,100',
            'nama_peserta' => 'required|string|max:50',
        ]);
        try {
            $week9 = Grade::findOrFail($id);
            $week9->update([
                'participant_id' => $request->nama_peserta,
                'exam_9' => $request->exam9,
                'submission_25' => $request->subexam25,
                'submission_26' => $request->subexam26,
                'submission_27' => $request->subexam27
            ]);
            if ($week9 == null) {
                abort(404);
            }
            return redirect(route('week9'))->with(['success' => 'Grade peserta : ' . $week9->participant->name . ' berhasil diupdate']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
    /* public function delete($id)
    {
        $week9 = Grade::findOrFail($id);
        $week9->delete();
        if($week9 == null){
            abort(404);
        }
        return redirect(route('week9'))->with(['success' =>  'List grade : ' .$week9->participant->name. ' berhasil dihapus' ]);
    } */
}
