<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class orang_tua extends Model
{

    protected $table= 'orang_tua';
    protected $primaryKey = 'no_kk';

    public function murid(){
        return $this->hasOne('App\Models\murid','no_kk');
    }
}
