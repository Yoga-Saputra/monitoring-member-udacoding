<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Week4 extends Model
{
    protected $fillable = [
        'exam_4', 'sub_exam_8', 'sub_exam_9', 'sub_exam_10', 'sub_exam_11', 'sub_exam_12', 'peserta_id', 'program_id', 'angkatan_id'
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
