<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Angkatan extends Model
{
    protected $table = 'angkatan';
    protected $fillable = [
        'nama_angkatan'
    ];
    public function participant(){
        return $this->hasMany('App\Participant');
    }
    public function week1()
    {
        return $this->hasOne('App\Week1');
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
    
}
