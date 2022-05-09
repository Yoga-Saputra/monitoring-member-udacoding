<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $fillable = [
        'exam_1', 'submission_1', 'exam_2', 'submission_2', 'submission_3', 'submission_4', 'exam_3', 'submission_5', 'submission_6', 'submission_7', 'exam_4', 'submission_8', 'submission_9', 'submission_10', 'submission_11', 'submission_12', 'exam_5', 'submission_13', 'submission_14', 'submission_15', 'exam_6', 'submission_16', 'submission_17', 'submission_18', 'exam_7', 'submission_19', 'submission_20', 'submission_21', 'exam_8', 'submission_22', 'submission_23', 'submission_24', 'exam_9', 'submission_25', 'submission_26', 'submission_27', 'exam_10', 'submission_28', 'submission_29', 'submission_30', 'exam_11', 'submission_31', 'submission_32', 'submission_33', 'exam_12', 'submission_34', 'submission_35', 'submission_36', 'participant_id', 'program_id'
    ];
    public function participant()
    {
        return $this->belongsTo('App\Participant');
    }
    public function program(){
        return $this->belongsTo('App\Program');
    }
}