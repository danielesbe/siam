<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class guru extends Model
{


    protected $table= 'guru';
    protected $guarded= [];
    public function mapel(){
        return $this->belongsToMany('App\Models\mapel','guru_mapel','id_guru','id_mapel');
    }
    public function kelas(){
        return $this->belongsToMany('App\Models\kelas','kelas_guru','id_guru','id_kelas');
    }
    public function walikelas(){
        return $this->hasOne('App\Models\kelas','id_wali_kelas');
    }

    public function scopeSearch($query, $val)
    {
        return $query
        ->where('nama','like','%'.$val.'%')
        ->Orwhere('nik','like','%'.$val.'%');

    }

}
