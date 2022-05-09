<?php

namespace App\Http\Controllers\Pages;

use App\Grade;
use App\Http\Controllers\Controller;
use App\Participant;
use App\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Week5Controller extends Controller
{
    public function index()
    {
        $participant = Participant::all();
        $program = Program::all();
        $data['list'] = 'List Peserta';
        if (Auth::user()->level == 'admin') {
            $total = Grade::selectRaw('IFNULL(exam_5,0) + IFNULL(submission_13,0) + IFNULL(submission_14,0) + IFNULL(submission_15,0) as total_grade,id, program_id, exam_5, submission_13, submission_14, submission_15, id, participant_id')->groupby('program_id', 'exam_5', 'submission_13', 'submission_14', 'submission_15', 'id', 'participant_id')->orderby('total_grade', 'desc')->get();
        } else {
            $total = Grade::selectRaw('IFNULL(exam_5,0) + IFNULL(submission_13,0) + IFNULL(submission_14,0) + IFNULL(submission_15,0) as total_grade,id, program_id, exam_5, submission_13, submission_14, submission_15, id, participant_id')->groupby('program_id', 'exam_5', 'submission_13', 'submission_14', 'submission_15', 'id', 'participant_id')->orderby('total_grade', 'desc')->where('participant_id', auth()->user()->participant_id)->get();
            // dd($total);
        }

        /* dd($total); */
        return view('pages.week5.index',  $data, compact('total', 'participant', 'program'));
    }
    /* public function store(Request $request)
    {
        $this->validate($request, [
            'exam5' => 'nullable|integer|between:0,100',
            'subexam8' => 'nullable|integer|between:0,100',
            'subexam9' => 'nullable|integer|between:0,100',
            'subexam13' => 'nullable|integer|between:0,100',
            'nama_peserta' => 'required|string|max:50',
        ]);
        try {
            $week5 = Grade::firstOrcreate([
                'participant_id' => $request->nama_peserta,
                'exam_4' => $request->exam5,
                'submission_8' => $request->subexam8,
                'submission_9' => $request->subexam9,
                'submission_10' => $request->subexam13
            ]);
            if($week5 == null){
                abort(404);
            }
            return redirect()->back()->with(['success' => 'Grade peserta: '  . $week5->participant->name . ' Week 4 berhasil  ditambahkan']);
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
        return view('pages.week5.edit', $data, compact('total', 'program', 'participant'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'exam5' => 'nullable|integer|between:0,100',
            'subexam13' => 'nullable|integer|between:0,100',
            'subexam14' => 'nullable|integer|between:0,100',
            'subexam15' => 'nullable|integer|between:0,100',
            'nama_peserta' => 'required|string|max:50',
        ]);
        try {
            $week5 = Grade::findOrFail($id);
            $week5->update([
                'participant_id' => $request->nama_peserta,
                'exam_5' => $request->exam5,
                'submission_13' => $request->subexam13,
                'submission_14' => $request->subexam14,
                'submission_15' => $request->subexam15
            ]);
            if ($week5 == null) {
                abort(404);
            }
            return redirect(route('week5'))->with(['success' => 'Grade peserta : ' . $week5->participant->name . ' berhasil diupdate']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
    /* public function delete($id)
    {
        $week5 = Grade::findOrFail($id);
        $week5->delete();
        if($week5 == null){
            abort(404);
        }
        return redirect(route('week5'))->with(['success' =>  'List grade : ' .$week5->participant->name. ' berhasil dihapus' ]);
    } */
}
