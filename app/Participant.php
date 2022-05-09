<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{

    protected $fillable = [
        'email', 'name', 'no_tlp', 'sekolah', 'angkatan', 'program_id'
    ];
    public function user()
    {
        return $this->hasMany('App\User');
    }

    public function testimoni()
    {
        return $this->hasMany('App\Testimoni');
    }
    public function program()
    {
        return $this->belongsTo('App\Program');
    }
    public function angkatan()
    {
        return $this->belongsTo('App\Angkatan');
    }
    public function week1()
    {
        return $this->belongsTo('App\Week1');
    }
    public function week2()
    {
        return $this->hasOne('App\Week2');
    }
    public function week3()
    {
        return $this->hasOne('App\Week3');
    }
    public function week4()
    {
        return $this->hasOne('App\Week4');
    }
    public function grade()
    {
        return $this->hasOne('App\Grade');
    }
}
