<?php

namespace App\Http\Controllers\Pages;

use App\Grade;
use App\Http\Controllers\Controller;
use App\Participant;
use App\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Week8Controller extends Controller
{
    public function index()
    {
        $participant = Participant::all();
        $program = Program::all();
        $data['list'] = 'List Peserta';
        if (Auth::user()->level == 'admin') {
            $total = Grade::selectRaw('IFNULL(exam_8,0) + IFNULL(submission_22,0) + IFNULL(submission_23,0) + IFNULL(submission_24,0) as total_grade,id, program_id, exam_8, submission_22, submission_23, submission_24, id, participant_id')->groupby('program_id', 'exam_8', 'submission_22', 'submission_23', 'submission_24', 'id', 'participant_id')->orderby('total_grade', 'desc')->get();
        } else {
            $total = Grade::selectRaw('IFNULL(exam_8,0) + IFNULL(submission_22,0) + IFNULL(submission_23,0) + IFNULL(submission_24,0) as total_grade,id, program_id, exam_8, submission_22, submission_23, submission_24, id, participant_id')->groupby('program_id', 'exam_8', 'submission_22', 'submission_23', 'submission_24', 'id', 'participant_id')->orderby('total_grade', 'desc')->where('participant_id', auth()->user()->participant_id)->get();
        }

        /* dd($total); */
        return view('pages.week8.index',  $data, compact('total', 'participant', 'program'));
    }
    /* public function store(Request $request)
    {
        $this->validate($request, [
            'exam8' => 'nullable|integer|between:0,100',
            'subexam8' => 'nullable|integer|between:0,100',
            'subexam9' => 'nullable|integer|between:0,100',
            'subexam22' => 'nullable|integer|between:0,100',
            'nama_peser23' => 'required|string|max:50',
        ]24
        try {
            $week8 = Grade::firstOrcreate([
                'participant_id' => $request->nama_peserta,
                'exam_8' => $request->exam8,
                'submission_8' => $request->subexam8,
                'submission_9' => $request->subexam9,
                'submission_22' => $request->subexam22
            ]23
            i24$week8 == null){
                abort(404);
            }
            return redirect()->back()->with(['success' => 'Grade peserta: '  . $week8->participant->name . ' Week 4 berhasil  ditambahkan']);
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
        return view('pages.week8.edit', $data, compact('total', 'program', 'participant'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'exam8' => 'nullable|integer|between:0,100',
            'subexam22' => 'nullable|integer|between:0,100',
            'subexam23' => 'nullable|integer|between:0,100',
            'subexam24' => 'nullable|integer|between:0,100',
            'nama_peserta' => 'required|string|max:50',
        ]);
        try {
            $week8 = Grade::findOrFail($id);
            $week8->update([
                'participant_id' => $request->nama_peserta,
                'exam_8' => $request->exam8,
                'submission_22' => $request->subexam22,
                'submission_23' => $request->subexam23,
                'submission_24' => $request->subexam24
            ]);
            if ($week8 == null) {
                abort(404);
            }
            return redirect(route('week8'))->with(['success' => 'Grade peserta : ' . $week8->participant->name . ' berhasil diupdate']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
    /* public function delete($id)
    {
        $week8 = Grade::findOrFail($id);
        $week8->delete();
        if($week8 == null){
            abort(404);
        }
        return redirect(route('week8'))->with(['success' =>  'List grade : ' .$week8->participant->name. ' berhasil dihapus' ]);
    } */
}
