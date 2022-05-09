<?php

namespace App\Http\Controllers\Pages;

use App\Grade;
use App\Http\Controllers\Controller;
use App\Participant;
use App\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Week12Controller extends Controller
{
    public function index()
    {
        $participant = Participant::all();
        $program = Program::all();
        $data['list'] = 'List Peserta';
        if (Auth::user()->level == 'admin') {
            $total = Grade::selectRaw('IFNULL(exam_12,0) + IFNULL(submission_34,0) + IFNULL(submission_35,0) + IFNULL(submission_36,0) as total_grade,id, program_id, exam_12, submission_34, submission_35, submission_36, id, participant_id')->groupby('program_id', 'exam_12', 'submission_34', 'submission_35', 'submission_36', 'id', 'participant_id')->orderby('total_grade', 'desc')->get();
        } else {
            $total = Grade::selectRaw('IFNULL(exam_12,0) + IFNULL(submission_34,0) + IFNULL(submission_35,0) + IFNULL(submission_36,0) as total_grade,id, program_id, exam_12, submission_34, submission_35, submission_36, id, participant_id')->groupby('program_id', 'exam_12', 'submission_34', 'submission_35', 'submission_36', 'id', 'participant_id')->orderby('total_grade', 'desc')->where('participant_id', auth()->user()->participant_id)->get();
        }


        /* dd($total); */
        return view('pages.week12.index',  $data, compact('total', 'participant', 'program'));
    }
    /* public function store(Request $request)
    {
        $this->validate($request, [
            'exam12' => 'nullable|integer|between:0,100',
            'subexam8' => 'nullable|integer|between:0,100',
            'subexam9' => 'nullable|integer|between:0,100',
            'subexam34' => 'nullable|integer|between:0,100',
            'nama_peserta' => 'required|string|max:50',
        ]);
        try {
            $week12 = Grade::firstOrcreate([
                'participant_id' => $request->nama_peserta,
                'exam_12' => $request->exam12,
                'submission_8' => $request->subexam8,
                'submission_9' => $request->subexam9,
                'submission_34' => $request->subexam34
            ]);
            if($week12 == null){
                abort(404);
            }
            return redirect()->back()->with(['success' => 'Grade peserta: '  . $week12->participant->name . ' Week 4 berhasil  ditambahkan']);
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
        return view('pages.week12.edit', $data, compact('total', 'program', 'participant'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'exam12' => 'nullable|integer|between:0,100',
            'subexam34' => 'nullable|integer|between:0,100',
            'subexam35' => 'nullable|integer|between:0,100',
            'subexam36' => 'nullable|integer|between:0,100',
            'nama_peserta' => 'required|string|max:50',
        ]);
        try {
            $week12 = Grade::findOrFail($id);
            $week12->update([
                'participant_id' => $request->nama_peserta,
                'exam_12' => $request->exam12,
                'submission_34' => $request->subexam34,
                'submission_35' => $request->subexam35,
                'submission_36' => $request->subexam36
            ]);
            if ($week12 == null) {
                abort(404);
            }
            return redirect(route('week12'))->with(['success' => 'Grade peserta : ' . $week12->participant->name . ' berhasil diupdate']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
    /* public function delete($id)
    {
        $week12 = Grade::findOrFail($id);
        $week12->delete();
        if($week12 == null){
            abort(404);
        }
        return redirect(route('week12'))->with(['success' =>  'List grade : ' .$week12->participant->name. ' berhasil dihapus' ]);
    } */
}
