<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class catatan extends Model
{
    protected $table= 'catatan';
    protected $guarded=[];
    public function semester(){
        return $this->belongsTo('App\Models\semester','id_semester') ;
    }
    public function murid(){
        return $this->belongsTo('App\Models\murid','id_murid');
    }
    public function tahun_ajaran(){
        return $this->belongsTo('App\Models\tahun_ajaran','id_tahun_ajaran');
    }
}
