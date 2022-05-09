<?php

namespace App\Http\Controllers\Frontend;

use App\Grade;
use App\Http\Controllers\Controller;
use App\Portofolio;
use App\Slider;
use App\Testimoni;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function flutter(Request $request)
    {
        // return $request->angkatan;
        $testi = Testimoni::all();
        $sliders = Slider::orderBy('id', 'desc')->get();
        $portofolios = Portofolio::orderBy('id', 'desc')->get();
        $grade =  Grade::join('participants', "participants.id", "=", "grades.participant_id")->join('programs', "programs.id", "=", "participants.program_id")->selectRaw('participants.name, participants.sekolah,programs.nama_program, participants.angkatan, IFNULL(exam_1,0) + IFNULL(submission_1,0) + IFNULL(submission_2,0) + IFNULL(submission_3,0) + IFNULL(exam_2,0) + IFNULL(submission_4,0) + IFNULL(submission_5,0) + IFNULL(submission_6,0) + IFNULL(exam_3,0) + IFNULL(submission_7,0) + IFNULL(submission_8,0) + IFNULL(submission_9,0) + IFNULL(exam_4,0) + IFNULL(submission_10,0) + IFNULL(submission_11,0) + IFNULL(submission_12,0) + IFNULL(exam_5,0) + IFNULL(submission_13,0) + IFNULL(submission_14,0) + IFNULL(submission_15,0) + IFNULL(exam_6,0) + IFNULL(submission_16,0) + IFNULL(submission_17,0) + IFNULL(submission_18,0) + IFNULL(exam_7,0) + IFNULL(submission_19,0) + IFNULL(submission_20,0) + IFNULL(submission_21,0) + IFNULL(exam_8,0) + IFNULL(submission_22,0) + IFNULL(submission_23,0) + IFNULL(submission_24,0) + IFNULL(exam_9,0) + IFNULL(submission_25,0) + IFNULL(submission_26,0) + IFNULL(submission_27,0) + IFNULL(exam_10,0) + IFNULL(submission_28,0) + IFNULL(submission_29,0) + IFNULL(submission_30,0) + IFNULL(exam_11,0) + IFNULL(submission_31,0) + IFNULL(submission_32,0) + IFNULL(submission_33,0) + IFNULL(exam_12,0) + IFNULL(submission_34,0) + IFNULL(submission_35,0) + IFNULL(submission_36,0) as total_grade')->orderby('total_grade', 'desc')->where('programs.id', 4)->limit(20);

        if ($request->angkatan) {
            $grade = $grade->where('angkatan', $request->angkatan);
        }
        $grade = $grade->get();

        return view('frontend.grade.flutter.index', compact('grade', 'testi', 'portofolios', 'sliders'));
    }
    public function flutterAll(Request $request)
    {
        $portofolios = Portofolio::orderBy('id', 'desc')->get();
        $grade =  Grade::join('participants', "participants.id", "=", "grades.participant_id")->join('programs', "programs.id", "=", "participants.program_id")->selectRaw('participants.name, participants.sekolah,programs.nama_program, participants.angkatan, IFNULL(exam_1,0) + IFNULL(submission_1,0) + IFNULL(submission_2,0) + IFNULL(submission_3,0) + IFNULL(exam_2,0) + IFNULL(submission_4,0) + IFNULL(submission_5,0) + IFNULL(submission_6,0) + IFNULL(exam_3,0) + IFNULL(submission_7,0) + IFNULL(submission_8,0) + IFNULL(submission_9,0) + IFNULL(exam_4,0) + IFNULL(submission_10,0) + IFNULL(submission_11,0) + IFNULL(submission_12,0) + IFNULL(exam_5,0) + IFNULL(submission_13,0) + IFNULL(submission_14,0) + IFNULL(submission_15,0) + IFNULL(exam_6,0) + IFNULL(submission_16,0) + IFNULL(submission_17,0) + IFNULL(submission_18,0) + IFNULL(exam_7,0) + IFNULL(submission_19,0) + IFNULL(submission_20,0) + IFNULL(submission_21,0) + IFNULL(exam_8,0) + IFNULL(submission_22,0) + IFNULL(submission_23,0) + IFNULL(submission_24,0) + IFNULL(exam_9,0) + IFNULL(submission_25,0) + IFNULL(submission_26,0) + IFNULL(submission_27,0) + IFNULL(exam_10,0) + IFNULL(submission_28,0) + IFNULL(submission_29,0) + IFNULL(submission_30,0) + IFNULL(exam_11,0) + IFNULL(submission_31,0) + IFNULL(submission_32,0) + IFNULL(submission_33,0) + IFNULL(exam_12,0) + IFNULL(submission_34,0) + IFNULL(submission_35,0) + IFNULL(submission_36,0) as total_grade')->orderby('total_grade', 'desc')->where('programs.id', 4);

        if ($request->angkatan) {
            $grade = $grade->where('angkatan', $request->angkatan);
        }
        $grade = $grade->get();

        return view('frontend.grade.flutter.all', compact('grade', 'portofolios'));
    }

    public function kotlin(Request $request)
    {
        $portofolios = Portofolio::orderBy('id', 'desc')->get();
        $grade =  Grade::join('participants', "participants.id", "=", "grades.participant_id")->join('programs', "programs.id", "=", "participants.program_id")->selectRaw('participants.name, participants.sekolah,programs.nama_program, participants.angkatan, IFNULL(exam_1,0) + IFNULL(submission_1,0) + IFNULL(submission_2,0) + IFNULL(submission_3,0) + IFNULL(exam_2,0) + IFNULL(submission_4,0) + IFNULL(submission_5,0) + IFNULL(submission_6,0) + IFNULL(exam_3,0) + IFNULL(submission_7,0) + IFNULL(submission_8,0) + IFNULL(submission_9,0) + IFNULL(exam_4,0) + IFNULL(submission_10,0) + IFNULL(submission_11,0) + IFNULL(submission_12,0) + IFNULL(exam_5,0) + IFNULL(submission_13,0) + IFNULL(submission_14,0) + IFNULL(submission_15,0) + IFNULL(exam_6,0) + IFNULL(submission_16,0) + IFNULL(submission_17,0) + IFNULL(submission_18,0) + IFNULL(exam_7,0) + IFNULL(submission_19,0) + IFNULL(submission_20,0) + IFNULL(submission_21,0) + IFNULL(exam_8,0) + IFNULL(submission_22,0) + IFNULL(submission_23,0) + IFNULL(submission_24,0) + IFNULL(exam_9,0) + IFNULL(submission_25,0) + IFNULL(submission_26,0) + IFNULL(submission_27,0) + IFNULL(exam_10,0) + IFNULL(submission_28,0) + IFNULL(submission_29,0) + IFNULL(submission_30,0) + IFNULL(exam_11,0) + IFNULL(submission_31,0) + IFNULL(submission_32,0) + IFNULL(submission_33,0) + IFNULL(exam_12,0) + IFNULL(submission_34,0) + IFNULL(submission_35,0) + IFNULL(submission_36,0) as total_grade')->orderby('total_grade', 'desc')->where('programs.id', 5)->limit(20);
        if ($request->angkatan) {
            $grade = $grade->where('angkatan', $request->angkatan);
        }
        $grade = $grade->get();

        return view('frontend.grade.kotlin.index', compact('grade', 'portofolios'));
    }
    public function kotlinAll(Request $request)
    {
        $portofolios = Portofolio::orderBy('id', 'desc')->get();
        $grade =  Grade::join('participants', "participants.id", "=", "grades.participant_id")->join('programs', "programs.id", "=", "participants.program_id")->selectRaw('participants.name, participants.sekolah,programs.nama_program, participants.angkatan, IFNULL(exam_1,0) + IFNULL(submission_1,0) + IFNULL(submission_2,0) + IFNULL(submission_3,0) + IFNULL(exam_2,0) + IFNULL(submission_4,0) + IFNULL(submission_5,0) + IFNULL(submission_6,0) + IFNULL(exam_3,0) + IFNULL(submission_7,0) + IFNULL(submission_8,0) + IFNULL(submission_9,0) + IFNULL(exam_4,0) + IFNULL(submission_10,0) + IFNULL(submission_11,0) + IFNULL(submission_12,0) + IFNULL(exam_5,0) + IFNULL(submission_13,0) + IFNULL(submission_14,0) + IFNULL(submission_15,0) + IFNULL(exam_6,0) + IFNULL(submission_16,0) + IFNULL(submission_17,0) + IFNULL(submission_18,0) + IFNULL(exam_7,0) + IFNULL(submission_19,0) + IFNULL(submission_20,0) + IFNULL(submission_21,0) + IFNULL(exam_8,0) + IFNULL(submission_22,0) + IFNULL(submission_23,0) + IFNULL(submission_24,0) + IFNULL(exam_9,0) + IFNULL(submission_25,0) + IFNULL(submission_26,0) + IFNULL(submission_27,0) + IFNULL(exam_10,0) + IFNULL(submission_28,0) + IFNULL(submission_29,0) + IFNULL(submission_30,0) + IFNULL(exam_11,0) + IFNULL(submission_31,0) + IFNULL(submission_32,0) + IFNULL(submission_33,0) + IFNULL(exam_12,0) + IFNULL(submission_34,0) + IFNULL(submission_35,0) + IFNULL(submission_36,0) as total_grade')->orderby('total_grade', 'desc')->where('programs.id', 5);
        if ($request->angkatan) {
            $grade = $grade->where('angkatan', $request->angkatan);
        }
        $grade = $grade->get();

        return view('frontend.grade.kotlin.all', compact('grade', 'portofolios'));
    }

    public function uiDesign(Request $request)
    {
        $portofolios = Portofolio::orderBy('id', 'desc')->get();
        $grade =  Grade::join('participants', "participants.id", "=", "grades.participant_id")->join('programs', "programs.id", "=", "participants.program_id")->selectRaw('participants.name, participants.sekolah,programs.nama_program, participants.angkatan, IFNULL(exam_1,0) + IFNULL(submission_1,0) + IFNULL(submission_2,0) + IFNULL(submission_3,0) + IFNULL(exam_2,0) + IFNULL(submission_4,0) + IFNULL(submission_5,0) + IFNULL(submission_6,0) + IFNULL(exam_3,0) + IFNULL(submission_7,0) + IFNULL(submission_8,0) + IFNULL(submission_9,0) + IFNULL(exam_4,0) + IFNULL(submission_10,0) + IFNULL(submission_11,0) + IFNULL(submission_12,0) + IFNULL(exam_5,0) + IFNULL(submission_13,0) + IFNULL(submission_14,0) + IFNULL(submission_15,0) + IFNULL(exam_6,0) + IFNULL(submission_16,0) + IFNULL(submission_17,0) + IFNULL(submission_18,0) + IFNULL(exam_7,0) + IFNULL(submission_19,0) + IFNULL(submission_20,0) + IFNULL(submission_21,0) + IFNULL(exam_8,0) + IFNULL(submission_22,0) + IFNULL(submission_23,0) + IFNULL(submission_24,0) + IFNULL(exam_9,0) + IFNULL(submission_25,0) + IFNULL(submission_26,0) + IFNULL(submission_27,0) + IFNULL(exam_10,0) + IFNULL(submission_28,0) + IFNULL(submission_29,0) + IFNULL(submission_30,0) + IFNULL(exam_11,0) + IFNULL(submission_31,0) + IFNULL(submission_32,0) + IFNULL(submission_33,0) + IFNULL(exam_12,0) + IFNULL(submission_34,0) + IFNULL(submission_35,0) + IFNULL(submission_36,0) as total_grade')->orderby('total_grade', 'desc')->where('programs.id', 6)->limit(20);
        if ($request->angkatan) {
            $grade = $grade->where('angkatan', $request->angkatan);
        }
        $grade = $grade->get();

        return view('frontend.grade.UiDesign.index', compact('grade', 'portofolios'));
    }
    public function uiDesignAll(Request $request)
    {
        $portofolios = Portofolio::orderBy('id', 'desc')->get();
        $grade =  Grade::join('participants', "participants.id", "=", "grades.participant_id")->join('programs', "programs.id", "=", "participants.program_id")->selectRaw('participants.name, participants.sekolah,programs.nama_program, participants.angkatan, IFNULL(exam_1,0) + IFNULL(submission_1,0) + IFNULL(submission_2,0) + IFNULL(submission_3,0) + IFNULL(exam_2,0) + IFNULL(submission_4,0) + IFNULL(submission_5,0) + IFNULL(submission_6,0) + IFNULL(exam_3,0) + IFNULL(submission_7,0) + IFNULL(submission_8,0) + IFNULL(submission_9,0) + IFNULL(exam_4,0) + IFNULL(submission_10,0) + IFNULL(submission_11,0) + IFNULL(submission_12,0) + IFNULL(exam_5,0) + IFNULL(submission_13,0) + IFNULL(submission_14,0) + IFNULL(submission_15,0) + IFNULL(exam_6,0) + IFNULL(submission_16,0) + IFNULL(submission_17,0) + IFNULL(submission_18,0) + IFNULL(exam_7,0) + IFNULL(submission_19,0) + IFNULL(submission_20,0) + IFNULL(submission_21,0) + IFNULL(exam_8,0) + IFNULL(submission_22,0) + IFNULL(submission_23,0) + IFNULL(submission_24,0) + IFNULL(exam_9,0) + IFNULL(submission_25,0) + IFNULL(submission_26,0) + IFNULL(submission_27,0) + IFNULL(exam_10,0) + IFNULL(submission_28,0) + IFNULL(submission_29,0) + IFNULL(submission_30,0) + IFNULL(exam_11,0) + IFNULL(submission_31,0) + IFNULL(submission_32,0) + IFNULL(submission_33,0) + IFNULL(exam_12,0) + IFNULL(submission_34,0) + IFNULL(submission_35,0) + IFNULL(submission_36,0) as total_grade')->orderby('total_grade', 'desc')->where('programs.id', 6);
        if ($request->angkatan) {
            $grade = $grade->where('angkatan', $request->angkatan);
        }
        $grade = $grade->get();

        return view('frontend.grade.UiDesign.all', compact('grade', 'portofolios'));
    }

    public function web(Request $request)
    {
        $portofolios = Portofolio::orderBy('id', 'desc')->get();
        $grade =  Grade::join('participants', "participants.id", "=", "grades.participant_id")->join('programs', "programs.id", "=", "participants.program_id")->selectRaw('participants.name, participants.sekolah,programs.nama_program, participants.angkatan, IFNULL(exam_1,0) + IFNULL(submission_1,0) + IFNULL(submission_2,0) + IFNULL(submission_3,0) + IFNULL(exam_2,0) + IFNULL(submission_4,0) + IFNULL(submission_5,0) + IFNULL(submission_6,0) + IFNULL(exam_3,0) + IFNULL(submission_7,0) + IFNULL(submission_8,0) + IFNULL(submission_9,0) + IFNULL(exam_4,0) + IFNULL(submission_10,0) + IFNULL(submission_11,0) + IFNULL(submission_12,0) + IFNULL(exam_5,0) + IFNULL(submission_13,0) + IFNULL(submission_14,0) + IFNULL(submission_15,0) + IFNULL(exam_6,0) + IFNULL(submission_16,0) + IFNULL(submission_17,0) + IFNULL(submission_18,0) + IFNULL(exam_7,0) + IFNULL(submission_19,0) + IFNULL(submission_20,0) + IFNULL(submission_21,0) + IFNULL(exam_8,0) + IFNULL(submission_22,0) + IFNULL(submission_23,0) + IFNULL(submission_24,0) + IFNULL(exam_9,0) + IFNULL(submission_25,0) + IFNULL(submission_26,0) + IFNULL(submission_27,0) + IFNULL(exam_10,0) + IFNULL(submission_28,0) + IFNULL(submission_29,0) + IFNULL(submission_30,0) + IFNULL(exam_11,0) + IFNULL(submission_31,0) + IFNULL(submission_32,0) + IFNULL(submission_33,0) + IFNULL(exam_12,0) + IFNULL(submission_34,0) + IFNULL(submission_35,0) + IFNULL(submission_36,0) as total_grade')->orderby('total_grade', 'desc')->where('programs.id', 1)->limit(20);
        if ($request->angkatan) {
            $grade = $grade->where('angkatan', $request->angkatan);
        }
        $grade = $grade->get();
        return view('frontend.grade.web.index', compact('grade', 'portofolios'));
    }
    public function webAll(Request $request)
    {
        $portofolios = Portofolio::orderBy('id', 'desc')->get();
        $grade =  Grade::join('participants', "participants.id", "=", "grades.participant_id")->join('programs', "programs.id", "=", "participants.program_id")->selectRaw('participants.name, participants.sekolah,programs.nama_program, participants.angkatan, IFNULL(exam_1,0) + IFNULL(submission_1,0) + IFNULL(submission_2,0) + IFNULL(submission_3,0) + IFNULL(exam_2,0) + IFNULL(submission_4,0) + IFNULL(submission_5,0) + IFNULL(submission_6,0) + IFNULL(exam_3,0) + IFNULL(submission_7,0) + IFNULL(submission_8,0) + IFNULL(submission_9,0) + IFNULL(exam_4,0) + IFNULL(submission_10,0) + IFNULL(submission_11,0) + IFNULL(submission_12,0) + IFNULL(exam_5,0) + IFNULL(submission_13,0) + IFNULL(submission_14,0) + IFNULL(submission_15,0) + IFNULL(exam_6,0) + IFNULL(submission_16,0) + IFNULL(submission_17,0) + IFNULL(submission_18,0) + IFNULL(exam_7,0) + IFNULL(submission_19,0) + IFNULL(submission_20,0) + IFNULL(submission_21,0) + IFNULL(exam_8,0) + IFNULL(submission_22,0) + IFNULL(submission_23,0) + IFNULL(submission_24,0) + IFNULL(exam_9,0) + IFNULL(submission_25,0) + IFNULL(submission_26,0) + IFNULL(submission_27,0) + IFNULL(exam_10,0) + IFNULL(submission_28,0) + IFNULL(submission_29,0) + IFNULL(submission_30,0) + IFNULL(exam_11,0) + IFNULL(submission_31,0) + IFNULL(submission_32,0) + IFNULL(submission_33,0) + IFNULL(exam_12,0) + IFNULL(submission_34,0) + IFNULL(submission_35,0) + IFNULL(submission_36,0) as total_grade')->orderby('total_grade', 'desc')->where('programs.id', 1);
        if ($request->angkatan) {
            $grade = $grade->where('angkatan', $request->angkatan);
        }
        $grade = $grade->get();
        return view('frontend.grade.web.all', compact('grade', 'portofolios'));
    }
}
