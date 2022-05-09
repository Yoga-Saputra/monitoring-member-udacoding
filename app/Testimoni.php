<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimoni extends Model
{
    protected $table = 'testimoni';
    protected $fillable = [
        'deskripsi', 'participant_id'
    ];
    public function participant()
    {
        return $this->belongsTo('App\Participant');
    }
}
