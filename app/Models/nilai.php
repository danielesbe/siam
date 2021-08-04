<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class nilai extends Model
{

    protected $table= 'nilai';
    protected $guarded=[];

    public function semester(){
        return $this->belongsTo('App\Models\semester','id_semester') ;
    }
    public function nilai_sikap(){
        return $this->hasMany('App\Models\nilai_sikap','id_nilai');
    }
    public function nilai_keterampilan(){
        return $this->hasMany('App\Models\nilai_keterampilan','id_nilai');
    }
    public function nilai_pengetahuan(){
        return $this->hasMany('App\Models\nilai_pengetahuan','id_nilai');
    }
    public function murid(){
        return $this->belongsTo('App\Models\murid','id_murid');
    }
    public function tahun_ajaran(){
        return $this->belongsTo('App\Models\tahun_ajaran','id_tahun_ajaran');
    }
}
