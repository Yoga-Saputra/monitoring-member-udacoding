<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Week1 extends Model
{
    protected $fillable = [
        'exam_1', 'sub_exam_1', 'participant_id', 'program_id'
    ];

    public function participant()
    {
        return $this->belongsTo('App\Participant');
    }
    public function program()
    {
        return $this->belongsTo('App\Program');
    }
    public function angkatan()
    {
        return $this->belongsTo('App\Angkatan');
    }
}
