<?php

namespace App\Http\Controllers\Pages;

use App\Grade;
use App\Http\Controllers\Controller;
use App\Participant;
use App\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Week11Controller extends Controller
{
    public function index()
    {
        $participant = Participant::all();
        $program = Program::all();
        $data['list'] = 'List Peserta';
        if (Auth::user()->level == 'admin') {
            $total = Grade::selectRaw('IFNULL(exam_11,0) + IFNULL(submission_31,0) + IFNULL(submission_32,0) + IFNULL(submission_33,0) as total_grade,id, program_id, exam_11, submission_31, submission_32, submission_33, id, participant_id')->groupby('program_id', 'exam_11', 'submission_31', 'submission_32', 'submission_33', 'id', 'participant_id')->orderby('total_grade', 'desc')->get();
        } else {
            $total = Grade::selectRaw('IFNULL(exam_11,0) + IFNULL(submission_31,0) + IFNULL(submission_32,0) + IFNULL(submission_33,0) as total_grade,id, program_id, exam_11, submission_31, submission_32, submission_33, id, participant_id')->groupby('program_id', 'exam_11', 'submission_31', 'submission_32', 'submission_33', 'id', 'participant_id')->orderby('total_grade', 'desc')->where('participant_id', auth()->user()->participant_id)->get();
        }

        /* dd($total); */
        return view('pages.week11.index',  $data, compact('total', 'participant', 'program'));
    }
    /* public function store(Request $request)
    {
        $this->validate($request, [
            'exam11' => 'nullable|integer|between:0,100',
            'subexam8' => 'nullable|integer|between:0,100',
            'subexam9' => 'nullable|integer|between:0,100',
            'subexam31' => 'nullable|integer|between:0,100',
            'nama_peserta' => 'required|string|max:50',
        ]);
        try {
            $week11 = Grade::firstOrcreate([
                'participant_id' => $request->nama_peserta,
                'exam_11' => $request->exam11,
                'submission_8' => $request->subexam8,
                'submission_9' => $request->subexam9,
                'submission_31' => $request->subexam31
            ]);
            if($week11 == null){
                abort(404);
            }
            return redirect()->back()->with(['success' => 'Grade peserta: '  . $week11->participant->name . ' Week 4 berhasil  ditambahkan']);
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
        return view('pages.week11.edit', $data, compact('total', 'program', 'participant'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'exam11' => 'nullable|integer|between:0,100',
            'subexam31' => 'nullable|integer|between:0,100',
            'subexam32' => 'nullable|integer|between:0,100',
            'subexam33' => 'nullable|integer|between:0,100',
            'nama_peserta' => 'required|string|max:50',
        ]);
        try {
            $week11 = Grade::findOrFail($id);
            $week11->update([
                'participant_id' => $request->nama_peserta,
                'exam_11' => $request->exam11,
                'submission_31' => $request->subexam31,
                'submission_32' => $request->subexam32,
                'submission_33' => $request->subexam33
            ]);
            if ($week11 == null) {
                abort(404);
            }
            return redirect(route('week11'))->with(['success' => 'Grade peserta : ' . $week11->participant->name . ' berhasil diupdate']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
    /* public function delete($id)
    {
        $week11 = Grade::findOrFail($id);
        $week11->delete();
        if($week11 == null){
            abort(404);
        }
        return redirect(route('week11'))->with(['success' =>  'List grade : ' .$week11->participant->name. ' berhasil dihapus' ]);
    } */
}
