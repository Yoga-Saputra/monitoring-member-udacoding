<?php

namespace App\Http\Controllers\Pages;

use App\Grade;
use App\Http\Controllers\Controller;
use App\Participant;
use App\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Week4Controller extends Controller
{
    public function index()
    {
        $participant = Participant::all();
        $program = Program::all();
        $data['list'] = 'List Peserta';
        if (Auth::user()->level == 'admin') {
            $total = Grade::selectRaw('IFNULL(exam_4,0) + IFNULL(submission_10,0) + IFNULL(submission_11,0) + IFNULL(submission_12,0) as total_grade,id, program_id, exam_4, submission_10, submission_11, submission_12, id, participant_id')->groupby('program_id', 'exam_4', 'submission_10', 'submission_11', 'submission_12', 'id', 'participant_id')->orderby('total_grade', 'desc')->get();
        } else {
            $total = Grade::selectRaw('IFNULL(exam_4,0) + IFNULL(submission_10,0) + IFNULL(submission_11,0) + IFNULL(submission_12,0) as total_grade,id, program_id, exam_4, submission_10, submission_11, submission_12, id, participant_id')->groupby('program_id', 'exam_4', 'submission_10', 'submission_11', 'submission_12', 'id', 'participant_id')->orderby('total_grade', 'desc')->where('participant_id', auth()->user()->participant_id)->get();
            // dd($total);
        }

        /* dd($total); */
        return view('pages.week4.index',  $data, compact('total', 'participant', 'program'));
    }
    /* public function store(Request $request)
    {
        $this->validate($request, [
            'exam4' => 'nullable|integer|between:0,100',
            'subexam8' => 'nullable|integer|between:0,100',
            'subexam9' => 'nullable|integer|between:0,100',
            'subexam10' => 'nullable|integer|between:0,100',
            'nama_peserta' => 'required|string|max:50',
        ]);
        try {
            $week4 = Grade::firstOrcreate([
                'participant_id' => $request->nama_peserta,
                'exam_4' => $request->exam4,
                'submission_8' => $request->subexam8,
                'submission_9' => $request->subexam9,
                'submission_10' => $request->subexam10
            ]);
            if($week4 == null){
                abort(404);
            }
            return redirect()->back()->with(['success' => 'Grade peserta: '  . $week4->participant->name . ' Week 4 berhasil  ditambahkan']);
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
        return view('pages.week4.edit', $data, compact('total', 'program', 'participant'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'exam4' => 'nullable|integer|between:0,100',
            'subexam10' => 'nullable|integer|between:0,100',
            'subexam11' => 'nullable|integer|between:0,100',
            'subexam12' => 'nullable|integer|between:0,100',
            'nama_peserta' => 'required|string|max:50',
        ]);
        try {
            $week4 = Grade::findOrFail($id);
            $week4->update([
                'participant_id' => $request->nama_peserta,
                'exam_4' => $request->exam4,
                'submission_10' => $request->subexam10,
                'submission_11' => $request->subexam11,
                'submission_12' => $request->subexam12
            ]);
            if ($week4 == null) {
                abort(404);
            }
            return redirect(route('week4'))->with(['success' => 'Grade peserta : ' . $week4->participant->name . ' berhasil diupdate']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
    /* public function delete($id)
    {
        $week4 = Grade::findOrFail($id);
        $week4->delete();
        if($week4 == null){
            abort(404);
        }
        return redirect(route('week4'))->with(['success' =>  'List grade : ' .$week4->participant->name. ' berhasil dihapus' ]);
    } */
}
