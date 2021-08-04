<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class kelas extends Model
{

    protected $table= 'kelas';
    protected $guarded=[];
    public function tahun_ajaran(){
        return $this->belongsTo('App\Models\tahun_ajaran','id_tahun_ajaran');
    }
    public function murid(){
        return $this->belongsToMany('App\Models\murid','kelas_murid','id_kelas','id_murid');
    }
    public function guru(){
        return $this->belongsToMany('App\Models\guru','kelas_guru','id_kelas','id_guru');
    }
    public function walikelas(){
        return $this->belongsTo('App\Models\guru','id_wali_kelas');
    }
    public function scopeSearch($query, $val)
    {
        return $query
        ->with(['guru' => function($q) use($val) {
            $q->where('nama', 'LIKE', '%' . $val . '%');
        },'murid']);

    }
}
