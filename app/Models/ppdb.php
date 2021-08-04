<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ppdb extends Model
{
    protected $table= 'ppdb';
    protected $guarded =[];
    public function scopeSearch($query, $val)
    {
        return $query
        ->where('nomor_pendaftaran','like','%'.$val.'%')
        ->Orwhere('nama','like','%'.$val.'%')
        ;

    }
    public function scopeCari($query, $val)
    {
        return $query
        ->where('nomor_pendaftaran','like','%'.$val.'%')
        ->Orwhere('nama','like','%'.$val.'%')
        ->Orwhere('nisn','like','%'.$val.'%')
        ;

    }
}
