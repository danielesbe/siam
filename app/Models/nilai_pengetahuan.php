<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class nilai_pengetahuan extends Model
{

    protected $table= 'nilai_pengetahuan';

    public function nilai(){
        return $this->belongsTo('App\Models\nilai','id_nilai');
    }

    public function mapel(){
        return $this->belongsTo('App\Models\mapel','id_mapel');
    }
}
