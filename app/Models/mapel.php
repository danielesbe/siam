<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class mapel extends Model
{

    protected $table= 'mapel';
    protected $guarded = [];

    public function nilai_pengetahuan(){
        return $this->hasMany('App\Models\nilai_pengetahuan','id_mapel');
    }
    public function nilai_keterampilan(){
        return $this->hasMany('App\Models\nilai_keterampilan','id_mapel');
    }
    public function guru(){
        return $this->belongsToMany('App\Models\guru','guru_mapel','id_mapel','id_guru');
    }
    public function scopeSearch($query, $val)
    {
        return $query
        ->where('nama','like','%'.$val.'%')
        ;

    }
}
