<?php

namespace App\Http\Controllers\Pages;

use App\Grade;
use App\Http\Controllers\Controller;
use App\Participant;
use App\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Week10Controller extends Controller
{
    public function index()
    {
        $participant = Participant::all();
        $program = Program::all();
        $data['list'] = 'List Peserta';
        if (Auth::user()->level == 'admin') {
            $total = Grade::selectRaw('IFNULL(exam_10,0) + IFNULL(submission_28,0) + IFNULL(submission_29,0) + IFNULL(submission_30,0) as total_grade,id, program_id, exam_10, submission_28, submission_29, submission_30, id, participant_id')->groupby('program_id', 'exam_10', 'submission_28', 'submission_29', 'submission_30', 'id', 'participant_id')->orderby('total_grade', 'desc')->get();
        } else {
            $total = Grade::selectRaw('IFNULL(exam_10,0) + IFNULL(submission_28,0) + IFNULL(submission_29,0) + IFNULL(submission_30,0) as total_grade,id, program_id, exam_10, submission_28, submission_29, submission_30, id, participant_id')->groupby('program_id', 'exam_10', 'submission_28', 'submission_29', 'submission_30', 'id', 'participant_id')->orderby('total_grade', 'desc')->where('participant_id', auth()->user()->participant_id)->get();
        }

        /* dd($total); */
        return view('pages.week10.index',  $data, compact('total', 'participant', 'program'));
    }
    /* public function store(Request $request)
    {
        $this->validate($request, [
            'exam10' => 'nullable|integer|between:0,100',
            'subexam8' => 'nullable|integer|between:0,100',
            'subexam9' => 'nullable|integer|between:0,100',
            'subexam28' => 'nullable|integer|between:0,100',
            'nama_peserta' => 'required|string|max:50',
        ]);
        try {
            $week10 = Grade::firstOrcreate([
                'participant_id' => $request->nama_peserta,
                'exam_10' => $request->exam10,
                'submission_8' => $request->subexam8,
                'submission_9' => $request->subexam9,
                'submission_28' => $request->subexam28
            ]);
            if($week10 == null){
                abort(404);
            }
            return redirect()->back()->with(['success' => 'Grade peserta: '  . $week10->participant->name . ' Week 4 berhasil  ditambahkan']);
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
        return view('pages.week10.edit', $data, compact('total', 'program', 'participant'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'exam10' => 'nullable|integer|between:0,100',
            'subexam28' => 'nullable|integer|between:0,100',
            'subexam29' => 'nullable|integer|between:0,100',
            'subexam30' => 'nullable|integer|between:0,100',
            'nama_peserta' => 'required|string|max:50',
        ]);
        try {
            $week10 = Grade::findOrFail($id);
            $week10->update([
                'participant_id' => $request->nama_peserta,
                'exam_10' => $request->exam10,
                'submission_28' => $request->subexam28,
                'submission_29' => $request->subexam29,
                'submission_30' => $request->subexam30
            ]);
            if ($week10 == null) {
                abort(404);
            }
            return redirect(route('week10'))->with(['success' => 'Grade peserta : ' . $week10->participant->name . ' berhasil diupdate']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
    /* public function delete($id)
    {
        $week10 = Grade::findOrFail($id);
        $week10->delete();
        if($week10 == null){
            abort(404);
        }
        return redirect(route('week10'))->with(['success' =>  'List grade : ' .$week10->participant->name. ' berhasil dihapus' ]);
    } */
}
