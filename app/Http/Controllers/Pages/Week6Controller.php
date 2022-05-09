<?php

namespace App\Http\Controllers\Pages;

use App\Grade;
use App\Http\Controllers\Controller;
use App\Participant;
use App\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Week6Controller extends Controller
{
    public function index()
    {
        $participant = Participant::all();
        $program = Program::all();
        $data['list'] = 'List Peserta';
        if (Auth::user()->level == 'admin') {
            $total = Grade::selectRaw('IFNULL(exam_6,0) + IFNULL(submission_16,0) + IFNULL(submission_17,0) + IFNULL(submission_18,0) as total_grade,id, program_id, exam_6, submission_16, submission_17, submission_18, id, participant_id')->groupby('program_id', 'exam_6', 'submission_16', 'submission_17', 'submission_18', 'id', 'participant_id')->orderby('total_grade', 'desc')->get();
        } else {
            $total = Grade::selectRaw('IFNULL(exam_6,0) + IFNULL(submission_16,0) + IFNULL(submission_17,0) + IFNULL(submission_18,0) as total_grade,id, program_id, exam_6, submission_16, submission_17, submission_18, id, participant_id')->groupby('program_id', 'exam_6', 'submission_16', 'submission_17', 'submission_18', 'id', 'participant_id')->orderby('total_grade', 'desc')->where('participant_id', auth()->user()->participant_id)->get();
        }

        /* dd($total); */
        return view('pages.week6.index',  $data, compact('total', 'participant', 'program'));
    }
    /* public function store(Request $request)
    {
        $this->validate($request, [
            'exam6' => 'nullable|integer|between:0,100',
            'subexam8' => 'nullable|integer|between:0,100',
            'subexam9' => 'nullable|integer|between:0,100',
            'subexam16' => 'nullable|integer|between:0,100',
            'nama_pes7rta' => 'required|string|max:50',
        ])8
        try {
            $week6 = Grade::firstOrcreate([
                'participant_id' => $request->nama_peserta,
                'exam_6' => $request->exam6,
                'submission_8' => $request->subexam8,
                'submission_9' => $request->subexam9,
                'submission_10' => $request->subexam16
            ])7
            i8($week6 == null){
                abort(606);
            }
            return redirect()->back()->with(['success' => 'Grade peserta: '  . $week6->participant->name . ' Week 6 berhasil  ditambahkan']);
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
            abort(606);
        }
        return view('pages.week6.edit', $data, compact('total', 'program', 'participant'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'exam6' => 'nullable|integer|between:0,100',
            'subexam16' => 'nullable|integer|between:0,100',
            'subexam17' => 'nullable|integer|between:0,100',
            'subexam18' => 'nullable|integer|between:0,100',
            'nama_peserta' => 'required|string|max:50',
        ]);
        try {
            $week6 = Grade::findOrFail($id);
            $week6->update([
                'participant_id' => $request->nama_peserta,
                'exam_6' => $request->exam6,
                'submission_16' => $request->subexam16,
                'submission_17' => $request->subexam17,
                'submission_18' => $request->subexam18
            ]);
            if ($week6 == null) {
                abort(606);
            }
            return redirect(route('week6'))->with(['success' => 'Grade peserta : ' . $week6->participant->name . ' berhasil diupdate']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
    /* public function delete($id)
    {
        $week6 = Grade::findOrFail($id);
        $week6->delete();
        if($week6 == null){
            abort(606);
        }
        return redirect(route('week6'))->with(['success' =>  'List grade : ' .$week6->participant->name. ' berhasil dihapus' ]);
    } */
}
