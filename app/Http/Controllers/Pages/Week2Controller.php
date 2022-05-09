<?php

namespace App\Http\Controllers\Pages;

use App\Grade;
use App\Http\Controllers\Controller;
use App\Participant;
use App\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Week2Controller extends Controller
{
    public function index()
    {
        $participant = Participant::all();
        $program = Program::all();
        $data['list'] = 'List Peserta';
        if (Auth::user()->level == 'admin') {
            $total = Grade::selectRaw('IFNULL(exam_2,0) + IFNULL(submission_4,0) + IFNULL(submission_5,0) + IFNULL(submission_6,0) as total_grade,id, program_id, exam_2, submission_4, submission_5, submission_6, id, participant_id')->groupby('program_id', 'exam_2', 'submission_4', 'submission_5', 'submission_6', 'id', 'participant_id')->orderby('total_grade', 'desc')->get();
        } else {
            $total = Grade::selectRaw('IFNULL(exam_2,0) + IFNULL(submission_4,0) + IFNULL(submission_5,0) + IFNULL(submission_6,0) as total_grade,id, program_id, exam_2, submission_4, submission_5, submission_6, id, participant_id')->groupby('program_id', 'exam_2', 'submission_4', 'submission_5', 'submission_6', 'id', 'participant_id')->orderby('total_grade', 'desc')->where('participant_id', auth()->user()->participant_id)->get();
            // dd($total);
        }

        /* dd($total); */
        return view('pages.week2.index',  $data, compact('total', 'participant', 'program'));
    }
    /* public function store(Request $request)
    {
        $this->validate($request, [
            'exam2' => 'nullable|integer|between:0,100',
            'subexam2' => 'nullable|integer|between:0,100',
            'subexam3' => 'nullable|integer|between:0,100',
            'subexam4' => 'nullable|integer|between:0,100',
            'nama_peserta' => 'required|string|max:50',
        ]);
        $week2 = Grade::firstOrcreate([
            'participant_id' => $request->nama_peserta,
            'exam_2' => $request->exam2,
            'submission_2' => $request->subexam2,
            'submission_3' => $request->subexam3,
            'submission_4' => $request->subexam4
        ]);
        if($week2 == null){
            abort(404);
        }
        return redirect()->back()->with(['success' => 'Grade peserta: '  . $week2->participant->name . ' Week 2 berhasil  ditambahkan']);

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
        return view('pages.week2.edit', $data, compact('total', 'program', 'participant'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'exam2' => 'nullable|integer|between:0,100',
            'subexam4' => 'nullable|integer|between:0,100',
            'subexam5' => 'nullable|integer|between:0,100',
            'subexam6' => 'nullable|integer|between:0,100',
            'nama_peserta' => 'required|string|max:50',
        ]);
        try {
            $week2 = Grade::findOrFail($id);
            $week2->update([
                'participant_id' => $request->nama_peserta,
                'exam_2' => $request->exam2,
                'submission_4' => $request->subexam4,
                'submission_5' => $request->subexam5,
                'submission_6' => $request->subexam6
            ]);
            if ($week2 == null) {
                abort(404);
            }
            return redirect(route('week2'))->with(['success' => 'Grade peserta : ' . $week2->participant->name . ' berhasil diupdate']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
    /* public function delete($id)
    {
        $week2 = Grade::findOrFail($id);
        $week2->delete();
        if($week2 == null){
            abort(404);
        }
        return redirect(route('week2'))->with(['success' =>  'List grade : ' .$week2->participant->name. ' berhasil dihapus' ]);
    } */
}
