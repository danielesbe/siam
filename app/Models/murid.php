<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class murid extends Model
{

    protected $table= 'murid';
    protected $guarded= [];

    public function nilai(){
        return $this->hasMany('App\Models\nilai','id_murid');
    }
    public function absensi()
    {
        return $this->hasMany('App\Models\absensi', 'id_murid');
    }
    public function catatan()
    {
        return $this->hasMany('App\Models\catatan','id_murid');
    }
    public function orang_tua(){
        return $this->belongsTo('App\Models\orang_tua','no_kk');
    }
    public function kelas(){
        return $this->belongsToMany('App\Models\kelas','kelas_murid','id_murid','id_kelas');
    }

    public function scopeSearch($query, $val)
    {
        return $query
        ->where('nama','like','%'.$val.'%')
        ->Orwhere('nis','like','%'.$val.'%')
        ;

    }
}
