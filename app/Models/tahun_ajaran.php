<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class tahun_ajaran extends Model
{

    protected $table= 'tahun_ajaran';
    protected $guarded= [];
    public function kelas(){
        return $this->hasMany('App\Models\kelas','id_tahun_ajaran');
    }
    public function scopeSearch($query, $val)
    {
        return $query
        ->where('nama','like','%'.$val.'%');
    }
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
