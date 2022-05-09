<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Week3 extends Model
{
    protected $fillable = [
        'exam_3', 'sub_exam_5', 'sub_exam_6', 'sub_exam_7', 'peserta_id', 'program_id', 'angkatan_id'
    ];

    public function participant()
    {
        return $this->belongsTo('App\Participant');
    }
    public function program(){
        return $this->belongsTo('App\Program');
    }
    public function angkatan(){
        return $this->belongsTo('App\Angkatan');
    }
}