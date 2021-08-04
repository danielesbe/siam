<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class nilai_sikap extends Model
{

    protected $table= 'nilai_sikap';

    public function nilai(){
        return $this->belongsTo('App\Models\nilai','id_nilai');
    }
}
