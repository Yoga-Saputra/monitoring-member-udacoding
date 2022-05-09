<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Week2 extends Model
{
    protected $fillable = [
        'exam_2', 'sub_exam_2', 'sub_exam_3', 'sub_exam_4', 'participant_id', 'program_id'
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
