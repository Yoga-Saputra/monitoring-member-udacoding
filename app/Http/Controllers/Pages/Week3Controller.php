<?php

namespace App\Http\Controllers\Pages;

use App\Grade;
use App\Http\Controllers\Controller;
use App\Participant;
use App\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Week3Controller extends Controller
{
    public function index()
    {
        $participant = Participant::all();
        $program = Program::all();
        $data['list'] = 'List Peserta';
        if (Auth::user()->level == 'admin') {
            $total = Grade::selectRaw('IFNULL(exam_3,0) + IFNULL(submission_7,0) + IFNULL(submission_8,0) + IFNULL(submission_9,0) as total_grade,id, program_id, exam_3, submission_7, submission_8, submission_9, id, participant_id')->groupby('program_id', 'exam_3', 'submission_7', 'submission_8', 'submission_9', 'id', 'participant_id')->orderby('total_grade', 'desc')->get();
        } else {
            $total = Grade::selectRaw('IFNULL(exam_3,0) + IFNULL(submission_7,0) + IFNULL(submission_8,0) + IFNULL(submission_9,0) as total_grade,id, program_id, exam_3, submission_7, submission_8, submission_9, id, participant_id')->groupby('program_id', 'exam_3', 'submission_7', 'submission_8', 'submission_9', 'id', 'participant_id')->orderby('total_grade', 'desc')->where('participant_id', auth()->user()->participant_id)->get();
            // dd($total);
        }

        /* dd($total); */
        return view('pages.week3.index',  $data, compact('total', 'participant', 'program'));
    }
    /* public function store(Request $request)
    {
        $this->validate($request, [
            'exam3' => 'nullable|integer|between:0,100',
            'subexam5' => 'nullable|integer|between:0,100',
            'subexam6' => 'nullable|integer|between:0,100',
            'subexam7' => 'nullable|integer|between:0,100',
            'nama_peserta' => 'required|string|max:50',
        ]);
        try {
            $week3 = Grade::firstOrcreate([
                'participant_id' => $request->nama_peserta,
                'exam_3' => $request->exam3,
                'submission_5' => $request->subexam5,
                'submission_6' => $request->subexam6,
                'submission_7' => $request->subexam7
            ]);
            if($week3 == null){
                abort(404);
            }
            return redirect()->back()->with(['success' => 'Grade peserta: '  . $week3->participant->name . ' Week 3 berhasil  ditambahkan']);
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
        return view('pages.week3.edit', $data, compact('total', 'program', 'participant'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'exam3' => 'nullable|integer|between:0,100',
            'subexam7' => 'nullable|integer|between:0,100',
            'subexam8' => 'nullable|integer|between:0,100',
            'subexam9' => 'nullable|integer|between:0,100',
            'nama_peserta' => 'required|string|max:50',
        ]);
        try {
            $week3 = Grade::findOrFail($id);
            $week3->update([
                'participant_id' => $request->nama_peserta,
                'exam_3' => $request->exam3,
                'submission_7' => $request->subexam7,
                'submission_8' => $request->subexam8,
                'submission_9' => $request->subexam9
            ]);
            if ($week3 == null) {
                abort(404);
            }
            return redirect(route('week3'))->with(['success' => 'Grade peserta : ' . $week3->participant->name . ' berhasil diupdate']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
    /* public function delete($id)
    {
        $week3 = Grade::findOrFail($id);
        $week3->delete();
        if($week3 == null){
            abort(404);
        }
        return redirect(route('week3'))->with(['success' =>  'List grade : ' .$week3->participant->name. ' berhasil dihapus' ]);
    } */
}
