<?php

namespace App\Http\Controllers\Pages;

use App\Exports\ReportGradeAndroidExport;
use App\Exports\ReportGradeFlutterExport;
use App\Exports\ReportGradeIosExport;
use App\Exports\ReportGradeKotlinExport;
use App\Exports\ReportGradeUIDesignExport;
use App\Exports\ReportGradeWebExport;
use App\Grade;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Participant;
use App\Program;
use App\User;
use App\Week4;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class GradeController extends Controller
{
    public function webReport()
    {
        return Excel::download(new ReportGradeWebExport, 'Nilai_Grade_Web.xlsx');
    }
    public function androidReport()
    {
        return Excel::download(new ReportGradeAndroidExport, 'Nilai_Grade_Android.xlsx');
    }
    public function iosReport()
    {
        return Excel::download(new ReportGradeIosExport, 'Nilai_Grade_Ios.xlsx');
    }
    public function flutterReport()
    {
        return Excel::download(new ReportGradeFlutterExport, 'Nilai_Grade_Flutter.xlsx');
    }
    public function kotlinReport()
    {
        return Excel::download(new ReportGradeKotlinExport, 'Nilai_Grade_Kotlin.xlsx');
    }
    public function uiDesignReport()
    {
        return Excel::download(new ReportGradeUIDesignExport, 'Nilai_Grade_UiDesign.xlsx');
    }


    public function changeProgramAngkatan(Request $request)
    {
        $input = Participant::join('programs', "programs.id", "=", "participants.program_id")->findOrFail($request->id);
        echo "<pre>";
        printf('<label>' . 'Angkatan = ' . $input->angkatan . ' - ' . 'Program = ' . $input->nama_program . ' </label>');
    }
    public function changePeserta(Request $request)
    {
        $input = User::join('programs', "programs.id", "=", "participants.program_id")->findOrFail($request->id);
        echo "<pre>";
        printf('<label>' . 'Angkatan = ' . $input->angkatan . ' - ' . 'Program = ' . $input->nama_program . ' </label>');
    }






    public function web(Request $request)
    {
        $data['list'] = 'Total Grade';
        if (Auth::user()->level == 'admin') {
            $grade =  Grade::join('participants', "participants.id", "=", "grades.participant_id")->join('programs', "programs.id", "=", "participants.program_id")->selectRaw('participants.name, participants.sekolah,programs.nama_program, participants.angkatan, IFNULL(exam_1,0) + IFNULL(submission_1,0) + IFNULL(submission_2,0) + IFNULL(submission_3,0) + IFNULL(exam_2,0) + IFNULL(submission_4,0) + IFNULL(submission_5,0) + IFNULL(submission_6,0) + IFNULL(exam_3,0) + IFNULL(submission_7,0) + IFNULL(submission_8,0) + IFNULL(submission_9,0) + IFNULL(exam_4,0) + IFNULL(submission_10,0) + IFNULL(submission_11,0) + IFNULL(submission_12,0) + IFNULL(exam_5,0) + IFNULL(submission_13,0) + IFNULL(submission_14,0) + IFNULL(submission_15,0) + IFNULL(exam_6,0) + IFNULL(submission_16,0) + IFNULL(submission_17,0) + IFNULL(submission_18,0) + IFNULL(exam_7,0) + IFNULL(submission_19,0) + IFNULL(submission_20,0) + IFNULL(submission_21,0) + IFNULL(exam_8,0) + IFNULL(submission_22,0) + IFNULL(submission_23,0) + IFNULL(submission_24,0) + IFNULL(exam_9,0) + IFNULL(submission_25,0) + IFNULL(submission_26,0) + IFNULL(submission_27,0) + IFNULL(exam_10,0) + IFNULL(submission_28,0) + IFNULL(submission_29,0) + IFNULL(submission_30,0) + IFNULL(exam_11,0) + IFNULL(submission_31,0) + IFNULL(submission_32,0) + IFNULL(submission_33,0) + IFNULL(exam_12,0) + IFNULL(submission_34,0) + IFNULL(submission_35,0) + IFNULL(submission_36,0) as total_grade')->orderby('total_grade', 'desc')->where('programs.id', 1);
        } else {
            $grade =  Grade::join('participants', "participants.id", "=", "grades.participant_id")->join('programs', "programs.id", "=", "participants.program_id")->selectRaw('participants.name, participants.sekolah,programs.nama_program, participants.angkatan, IFNULL(exam_1,0) + IFNULL(submission_1,0) + IFNULL(submission_2,0) + IFNULL(submission_3,0) + IFNULL(exam_2,0) + IFNULL(submission_4,0) + IFNULL(submission_5,0) + IFNULL(submission_6,0) + IFNULL(exam_3,0) + IFNULL(submission_7,0) + IFNULL(submission_8,0) + IFNULL(submission_9,0) + IFNULL(exam_4,0) + IFNULL(submission_10,0) + IFNULL(submission_11,0) + IFNULL(submission_12,0) + IFNULL(exam_5,0) + IFNULL(submission_13,0) + IFNULL(submission_14,0) + IFNULL(submission_15,0) + IFNULL(exam_6,0) + IFNULL(submission_16,0) + IFNULL(submission_17,0) + IFNULL(submission_18,0) + IFNULL(exam_7,0) + IFNULL(submission_19,0) + IFNULL(submission_20,0) + IFNULL(submission_21,0) + IFNULL(exam_8,0) + IFNULL(submission_22,0) + IFNULL(submission_23,0) + IFNULL(submission_24,0) + IFNULL(exam_9,0) + IFNULL(submission_25,0) + IFNULL(submission_26,0) + IFNULL(submission_27,0) + IFNULL(exam_10,0) + IFNULL(submission_28,0) + IFNULL(submission_29,0) + IFNULL(submission_30,0) + IFNULL(exam_11,0) + IFNULL(submission_31,0) + IFNULL(submission_32,0) + IFNULL(submission_33,0) + IFNULL(exam_12,0) + IFNULL(submission_34,0) + IFNULL(submission_35,0) + IFNULL(submission_36,0) as total_grade')->orderby('total_grade', 'desc')->where('programs.id', 1)->where('participant_id', auth()->user()->participant_id);
        }

        if ($request->angkatan) {
            $grade = $grade->where('angkatan', $request->angkatan);
        }
        $grade = $grade->get();

        return view('pages.grade.web', $data, compact('grade'));
    }

    public function android(Request $request)
    {
        $data['list'] = 'Total Grade';
        if (Auth::user()->level == 'admin') {
            $grade =  Grade::join('participants', "participants.id", "=", "grades.participant_id")->join('programs', "programs.id", "=", "participants.program_id")->selectRaw('participants.name, participants.sekolah,programs.nama_program, participants.angkatan, IFNULL(exam_1,0) + IFNULL(submission_1,0) + IFNULL(submission_2,0) + IFNULL(submission_3,0) + IFNULL(exam_2,0) + IFNULL(submission_4,0) + IFNULL(submission_5,0) + IFNULL(submission_6,0) + IFNULL(exam_3,0) + IFNULL(submission_7,0) + IFNULL(submission_8,0) + IFNULL(submission_9,0) + IFNULL(exam_4,0) + IFNULL(submission_10,0) + IFNULL(submission_11,0) + IFNULL(submission_12,0) + IFNULL(exam_5,0) + IFNULL(submission_13,0) + IFNULL(submission_14,0) + IFNULL(submission_15,0) + IFNULL(exam_6,0) + IFNULL(submission_16,0) + IFNULL(submission_17,0) + IFNULL(submission_18,0) + IFNULL(exam_7,0) + IFNULL(submission_19,0) + IFNULL(submission_20,0) + IFNULL(submission_21,0) + IFNULL(exam_8,0) + IFNULL(submission_22,0) + IFNULL(submission_23,0) + IFNULL(submission_24,0) + IFNULL(exam_9,0) + IFNULL(submission_25,0) + IFNULL(submission_26,0) + IFNULL(submission_27,0) + IFNULL(exam_10,0) + IFNULL(submission_28,0) + IFNULL(submission_29,0) + IFNULL(submission_30,0) + IFNULL(exam_11,0) + IFNULL(submission_31,0) + IFNULL(submission_32,0) + IFNULL(submission_33,0) + IFNULL(exam_12,0) + IFNULL(submission_34,0) + IFNULL(submission_35,0) + IFNULL(submission_36,0) as total_grade')->orderby('total_grade', 'desc')->where('programs.id', 2);
        } else {
            $grade =  Grade::join('participants', "participants.id", "=", "grades.participant_id")->join('programs', "programs.id", "=", "participants.program_id")->selectRaw('participants.name, participants.sekolah,programs.nama_program, participants.angkatan, IFNULL(exam_1,0) + IFNULL(submission_1,0) + IFNULL(submission_2,0) + IFNULL(submission_3,0) + IFNULL(exam_2,0) + IFNULL(submission_4,0) + IFNULL(submission_5,0) + IFNULL(submission_6,0) + IFNULL(exam_3,0) + IFNULL(submission_7,0) + IFNULL(submission_8,0) + IFNULL(submission_9,0) + IFNULL(exam_4,0) + IFNULL(submission_10,0) + IFNULL(submission_11,0) + IFNULL(submission_12,0) + IFNULL(exam_5,0) + IFNULL(submission_13,0) + IFNULL(submission_14,0) + IFNULL(submission_15,0) + IFNULL(exam_6,0) + IFNULL(submission_16,0) + IFNULL(submission_17,0) + IFNULL(submission_18,0) + IFNULL(exam_7,0) + IFNULL(submission_19,0) + IFNULL(submission_20,0) + IFNULL(submission_21,0) + IFNULL(exam_8,0) + IFNULL(submission_22,0) + IFNULL(submission_23,0) + IFNULL(submission_24,0) + IFNULL(exam_9,0) + IFNULL(submission_25,0) + IFNULL(submission_26,0) + IFNULL(submission_27,0) + IFNULL(exam_10,0) + IFNULL(submission_28,0) + IFNULL(submission_29,0) + IFNULL(submission_30,0) + IFNULL(exam_11,0) + IFNULL(submission_31,0) + IFNULL(submission_32,0) + IFNULL(submission_33,0) + IFNULL(exam_12,0) + IFNULL(submission_34,0) + IFNULL(submission_35,0) + IFNULL(submission_36,0) as total_grade')->orderby('total_grade', 'desc')->where('programs.id', 2)->where('participant_id', auth()->user()->participant_id);
            // dd($total);
        }

        if ($request->angkatan) {
            $grade = $grade->where('angkatan', $request->angkatan);
        }
        $grade = $grade->get();

        return view('pages.grade.android', $data, compact('grade'));
    }

    public function ios(Request $request)
    {
        $data['list'] = 'Total Grade';
        if (Auth::user()->level == 'admin') {
            $grade =  Grade::join('participants', "participants.id", "=", "grades.participant_id")->join('programs', "programs.id", "=", "participants.program_id")->selectRaw('participants.name, participants.sekolah,programs.nama_program, participants.angkatan, IFNULL(exam_1,0) + IFNULL(submission_1,0) + IFNULL(submission_2,0) + IFNULL(submission_3,0) + IFNULL(exam_2,0) + IFNULL(submission_4,0) + IFNULL(submission_5,0) + IFNULL(submission_6,0) + IFNULL(exam_3,0) + IFNULL(submission_7,0) + IFNULL(submission_8,0) + IFNULL(submission_9,0) + IFNULL(exam_4,0) + IFNULL(submission_10,0) + IFNULL(submission_11,0) + IFNULL(submission_12,0) + IFNULL(exam_5,0) + IFNULL(submission_13,0) + IFNULL(submission_14,0) + IFNULL(submission_15,0) + IFNULL(exam_6,0) + IFNULL(submission_16,0) + IFNULL(submission_17,0) + IFNULL(submission_18,0) + IFNULL(exam_7,0) + IFNULL(submission_19,0) + IFNULL(submission_20,0) + IFNULL(submission_21,0) + IFNULL(exam_8,0) + IFNULL(submission_22,0) + IFNULL(submission_23,0) + IFNULL(submission_24,0) + IFNULL(exam_9,0) + IFNULL(submission_25,0) + IFNULL(submission_26,0) + IFNULL(submission_27,0) + IFNULL(exam_10,0) + IFNULL(submission_28,0) + IFNULL(submission_29,0) + IFNULL(submission_30,0) + IFNULL(exam_11,0) + IFNULL(submission_31,0) + IFNULL(submission_32,0) + IFNULL(submission_33,0) + IFNULL(exam_12,0) + IFNULL(submission_34,0) + IFNULL(submission_35,0) + IFNULL(submission_36,0) as total_grade')->orderby('total_grade', 'desc')->where('programs.id', 3);
        } else {
            $grade =  Grade::join('participants', "participants.id", "=", "grades.participant_id")->join('programs', "programs.id", "=", "participants.program_id")->selectRaw('participants.name, participants.sekolah,programs.nama_program, participants.angkatan, IFNULL(exam_1,0) + IFNULL(submission_1,0) + IFNULL(submission_2,0) + IFNULL(submission_3,0) + IFNULL(exam_2,0) + IFNULL(submission_4,0) + IFNULL(submission_5,0) + IFNULL(submission_6,0) + IFNULL(exam_3,0) + IFNULL(submission_7,0) + IFNULL(submission_8,0) + IFNULL(submission_9,0) + IFNULL(exam_4,0) + IFNULL(submission_10,0) + IFNULL(submission_11,0) + IFNULL(submission_12,0) + IFNULL(exam_5,0) + IFNULL(submission_13,0) + IFNULL(submission_14,0) + IFNULL(submission_15,0) + IFNULL(exam_6,0) + IFNULL(submission_16,0) + IFNULL(submission_17,0) + IFNULL(submission_18,0) + IFNULL(exam_7,0) + IFNULL(submission_19,0) + IFNULL(submission_20,0) + IFNULL(submission_21,0) + IFNULL(exam_8,0) + IFNULL(submission_22,0) + IFNULL(submission_23,0) + IFNULL(submission_24,0) + IFNULL(exam_9,0) + IFNULL(submission_25,0) + IFNULL(submission_26,0) + IFNULL(submission_27,0) + IFNULL(exam_10,0) + IFNULL(submission_28,0) + IFNULL(submission_29,0) + IFNULL(submission_30,0) + IFNULL(exam_11,0) + IFNULL(submission_31,0) + IFNULL(submission_32,0) + IFNULL(submission_33,0) + IFNULL(exam_12,0) + IFNULL(submission_34,0) + IFNULL(submission_35,0) + IFNULL(submission_36,0) as total_grade')->orderby('total_grade', 'desc')->where('programs.id', 3)->where('participant_id', auth()->user()->participant_id);
            // dd($total);
        }


        if ($request->angkatan) {
            $grade = $grade->where('angkatan', $request->angkatan);
        }
        $grade = $grade->get();

        return view('pages.grade.ios', $data, compact('grade'));
    }

    public function flutter(Request $request)
    {
        $data['list'] = 'Total Grade';
        if (Auth::user()->level == 'admin') {
            $grade =  Grade::join('participants', "participants.id", "=", "grades.participant_id")->join('programs', "programs.id", "=", "participants.program_id")->selectRaw('participants.name, participants.sekolah,programs.nama_program, participants.angkatan, IFNULL(exam_1,0) + IFNULL(submission_1,0) + IFNULL(submission_2,0) + IFNULL(submission_3,0) + IFNULL(exam_2,0) + IFNULL(submission_4,0) + IFNULL(submission_5,0) + IFNULL(submission_6,0) + IFNULL(exam_3,0) + IFNULL(submission_7,0) + IFNULL(submission_8,0) + IFNULL(submission_9,0) + IFNULL(exam_4,0) + IFNULL(submission_10,0) + IFNULL(submission_11,0) + IFNULL(submission_12,0) + IFNULL(exam_5,0) + IFNULL(submission_13,0) + IFNULL(submission_14,0) + IFNULL(submission_15,0) + IFNULL(exam_6,0) + IFNULL(submission_16,0) + IFNULL(submission_17,0) + IFNULL(submission_18,0) + IFNULL(exam_7,0) + IFNULL(submission_19,0) + IFNULL(submission_20,0) + IFNULL(submission_21,0) + IFNULL(exam_8,0) + IFNULL(submission_22,0) + IFNULL(submission_23,0) + IFNULL(submission_24,0) + IFNULL(exam_9,0) + IFNULL(submission_25,0) + IFNULL(submission_26,0) + IFNULL(submission_27,0) + IFNULL(exam_10,0) + IFNULL(submission_28,0) + IFNULL(submission_29,0) + IFNULL(submission_30,0) + IFNULL(exam_11,0) + IFNULL(submission_31,0) + IFNULL(submission_32,0) + IFNULL(submission_33,0) + IFNULL(exam_12,0) + IFNULL(submission_34,0) + IFNULL(submission_35,0) + IFNULL(submission_36,0) as total_grade')->orderby('total_grade', 'desc')->where('programs.id', 4);
        } else {
            $grade =  Grade::join('participants', "participants.id", "=", "grades.participant_id")->join('programs', "programs.id", "=", "participants.program_id")->selectRaw('participants.name, participants.sekolah,programs.nama_program, participants.angkatan, IFNULL(exam_1,0) + IFNULL(submission_1,0) + IFNULL(submission_2,0) + IFNULL(submission_3,0) + IFNULL(exam_2,0) + IFNULL(submission_4,0) + IFNULL(submission_5,0) + IFNULL(submission_6,0) + IFNULL(exam_3,0) + IFNULL(submission_7,0) + IFNULL(submission_8,0) + IFNULL(submission_9,0) + IFNULL(exam_4,0) + IFNULL(submission_10,0) + IFNULL(submission_11,0) + IFNULL(submission_12,0) + IFNULL(exam_5,0) + IFNULL(submission_13,0) + IFNULL(submission_14,0) + IFNULL(submission_15,0) + IFNULL(exam_6,0) + IFNULL(submission_16,0) + IFNULL(submission_17,0) + IFNULL(submission_18,0) + IFNULL(exam_7,0) + IFNULL(submission_19,0) + IFNULL(submission_20,0) + IFNULL(submission_21,0) + IFNULL(exam_8,0) + IFNULL(submission_22,0) + IFNULL(submission_23,0) + IFNULL(submission_24,0) + IFNULL(exam_9,0) + IFNULL(submission_25,0) + IFNULL(submission_26,0) + IFNULL(submission_27,0) + IFNULL(exam_10,0) + IFNULL(submission_28,0) + IFNULL(submission_29,0) + IFNULL(submission_30,0) + IFNULL(exam_11,0) + IFNULL(submission_31,0) + IFNULL(submission_32,0) + IFNULL(submission_33,0) + IFNULL(exam_12,0) + IFNULL(submission_34,0) + IFNULL(submission_35,0) + IFNULL(submission_36,0) as total_grade')->orderby('total_grade', 'desc')->where('programs.id', 4)->where('participant_id', auth()->user()->participant_id);
        }


        if ($request->angkatan) {
            $grade = $grade->where('angkatan', $request->angkatan);
        }
        $grade = $grade->get();

        return view('pages.grade.flutter', $data, compact('grade'));
    }

    public function kotlin(Request $request)
    {
        $data['list'] = 'Total Grade';
        if (Auth::user()->level == 'admin') {
            $grade =  Grade::join('participants', "participants.id", "=", "grades.participant_id")->join('programs', "programs.id", "=", "participants.program_id")->selectRaw('participants.name, participants.sekolah,programs.nama_program, participants.angkatan, IFNULL(exam_1,0) + IFNULL(submission_1,0) + IFNULL(submission_2,0) + IFNULL(submission_3,0) + IFNULL(exam_2,0) + IFNULL(submission_4,0) + IFNULL(submission_5,0) + IFNULL(submission_6,0) + IFNULL(exam_3,0) + IFNULL(submission_7,0) + IFNULL(submission_8,0) + IFNULL(submission_9,0) + IFNULL(exam_4,0) + IFNULL(submission_10,0) + IFNULL(submission_11,0) + IFNULL(submission_12,0) + IFNULL(exam_5,0) + IFNULL(submission_13,0) + IFNULL(submission_14,0) + IFNULL(submission_15,0) + IFNULL(exam_6,0) + IFNULL(submission_16,0) + IFNULL(submission_17,0) + IFNULL(submission_18,0) + IFNULL(exam_7,0) + IFNULL(submission_19,0) + IFNULL(submission_20,0) + IFNULL(submission_21,0) + IFNULL(exam_8,0) + IFNULL(submission_22,0) + IFNULL(submission_23,0) + IFNULL(submission_24,0) + IFNULL(exam_9,0) + IFNULL(submission_25,0) + IFNULL(submission_26,0) + IFNULL(submission_27,0) + IFNULL(exam_10,0) + IFNULL(submission_28,0) + IFNULL(submission_29,0) + IFNULL(submission_30,0) + IFNULL(exam_11,0) + IFNULL(submission_31,0) + IFNULL(submission_32,0) + IFNULL(submission_33,0) + IFNULL(exam_12,0) + IFNULL(submission_34,0) + IFNULL(submission_35,0) + IFNULL(submission_36,0) as total_grade')->orderby('total_grade', 'desc')->where('programs.id', 5);
        } else {
            $grade =  Grade::join('participants', "participants.id", "=", "grades.participant_id")->join('programs', "programs.id", "=", "participants.program_id")->selectRaw('participants.name, participants.sekolah,programs.nama_program, participants.angkatan, IFNULL(exam_1,0) + IFNULL(submission_1,0) + IFNULL(submission_2,0) + IFNULL(submission_3,0) + IFNULL(exam_2,0) + IFNULL(submission_4,0) + IFNULL(submission_5,0) + IFNULL(submission_6,0) + IFNULL(exam_3,0) + IFNULL(submission_7,0) + IFNULL(submission_8,0) + IFNULL(submission_9,0) + IFNULL(exam_4,0) + IFNULL(submission_10,0) + IFNULL(submission_11,0) + IFNULL(submission_12,0) + IFNULL(exam_5,0) + IFNULL(submission_13,0) + IFNULL(submission_14,0) + IFNULL(submission_15,0) + IFNULL(exam_6,0) + IFNULL(submission_16,0) + IFNULL(submission_17,0) + IFNULL(submission_18,0) + IFNULL(exam_7,0) + IFNULL(submission_19,0) + IFNULL(submission_20,0) + IFNULL(submission_21,0) + IFNULL(exam_8,0) + IFNULL(submission_22,0) + IFNULL(submission_23,0) + IFNULL(submission_24,0) + IFNULL(exam_9,0) + IFNULL(submission_25,0) + IFNULL(submission_26,0) + IFNULL(submission_27,0) + IFNULL(exam_10,0) + IFNULL(submission_28,0) + IFNULL(submission_29,0) + IFNULL(submission_30,0) + IFNULL(exam_11,0) + IFNULL(submission_31,0) + IFNULL(submission_32,0) + IFNULL(submission_33,0) + IFNULL(exam_12,0) + IFNULL(submission_34,0) + IFNULL(submission_35,0) + IFNULL(submission_36,0) as total_grade')->orderby('total_grade', 'desc')->where('programs.id', 5)->where('participant_id', auth()->user()->participant_id);
        }
        if ($request->angkatan) {
            $grade = $grade->where('angkatan', $request->angkatan);
        }
        $grade = $grade->get();

        return view('pages.grade.kotlin', $data, compact('grade'));
    }

    public function ui_design(Request $request)
    {
        $data['list'] = 'Total Grade';
        if (Auth::user()->level == 'admin') {
            $grade =  Grade::join('participants', "participants.id", "=", "grades.participant_id")->join('programs', "programs.id", "=", "participants.program_id")->selectRaw('participants.name, participants.sekolah,programs.nama_program, participants.angkatan, IFNULL(exam_1,0) + IFNULL(submission_1,0) + IFNULL(submission_2,0) + IFNULL(submission_3,0) + IFNULL(exam_2,0) + IFNULL(submission_4,0) + IFNULL(submission_5,0) + IFNULL(submission_6,0) + IFNULL(exam_3,0) + IFNULL(submission_7,0) + IFNULL(submission_8,0) + IFNULL(submission_9,0) + IFNULL(exam_4,0) + IFNULL(submission_10,0) + IFNULL(submission_11,0) + IFNULL(submission_12,0) + IFNULL(exam_5,0) + IFNULL(submission_13,0) + IFNULL(submission_14,0) + IFNULL(submission_15,0) + IFNULL(exam_6,0) + IFNULL(submission_16,0) + IFNULL(submission_17,0) + IFNULL(submission_18,0) + IFNULL(exam_7,0) + IFNULL(submission_19,0) + IFNULL(submission_20,0) + IFNULL(submission_21,0) + IFNULL(exam_8,0) + IFNULL(submission_22,0) + IFNULL(submission_23,0) + IFNULL(submission_24,0) + IFNULL(exam_9,0) + IFNULL(submission_25,0) + IFNULL(submission_26,0) + IFNULL(submission_27,0) + IFNULL(exam_10,0) + IFNULL(submission_28,0) + IFNULL(submission_29,0) + IFNULL(submission_30,0) + IFNULL(exam_11,0) + IFNULL(submission_31,0) + IFNULL(submission_32,0) + IFNULL(submission_33,0) + IFNULL(exam_12,0) + IFNULL(submission_34,0) + IFNULL(submission_35,0) + IFNULL(submission_36,0) as total_grade')->orderby('total_grade', 'desc')->where('programs.id', 6);
        } else {
            $grade =  Grade::join('participants', "participants.id", "=", "grades.participant_id")->join('programs', "programs.id", "=", "participants.program_id")->selectRaw('participants.name, participants.sekolah,programs.nama_program, participants.angkatan, IFNULL(exam_1,0) + IFNULL(submission_1,0) + IFNULL(submission_2,0) + IFNULL(submission_3,0) + IFNULL(exam_2,0) + IFNULL(submission_4,0) + IFNULL(submission_5,0) + IFNULL(submission_6,0) + IFNULL(exam_3,0) + IFNULL(submission_7,0) + IFNULL(submission_8,0) + IFNULL(submission_9,0) + IFNULL(exam_4,0) + IFNULL(submission_10,0) + IFNULL(submission_11,0) + IFNULL(submission_12,0) + IFNULL(exam_5,0) + IFNULL(submission_13,0) + IFNULL(submission_14,0) + IFNULL(submission_15,0) + IFNULL(exam_6,0) + IFNULL(submission_16,0) + IFNULL(submission_17,0) + IFNULL(submission_18,0) + IFNULL(exam_7,0) + IFNULL(submission_19,0) + IFNULL(submission_20,0) + IFNULL(submission_21,0) + IFNULL(exam_8,0) + IFNULL(submission_22,0) + IFNULL(submission_23,0) + IFNULL(submission_24,0) + IFNULL(exam_9,0) + IFNULL(submission_25,0) + IFNULL(submission_26,0) + IFNULL(submission_27,0) + IFNULL(exam_10,0) + IFNULL(submission_28,0) + IFNULL(submission_29,0) + IFNULL(submission_30,0) + IFNULL(exam_11,0) + IFNULL(submission_31,0) + IFNULL(submission_32,0) + IFNULL(submission_33,0) + IFNULL(exam_12,0) + IFNULL(submission_34,0) + IFNULL(submission_35,0) + IFNULL(submission_36,0) as total_grade')->orderby('total_grade', 'desc')->where('programs.id', 6)->where('participant_id', auth()->user()->participant_id);
        }
        if ($request->angkatan) {
            $grade = $grade->where('angkatan', $request->angkatan);
        }
        $grade = $grade->get();

        return view('pages.grade.ui_design', $data, compact('grade'));
    }
}
