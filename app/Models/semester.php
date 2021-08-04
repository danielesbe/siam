<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class semester extends Model
{

    protected $table= 'semester';

    public function nilai() {
        return $this->hasMany('App\Models\nilai','id_semester');
    }
    public function absensi(){
        return $this->hasMany('App\Models\absensi','id_semester');
    }
    public function catatan(){
        return $this->hasMany('App\Models\absensi','id_semester');
    }
}
