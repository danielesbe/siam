<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Pengguna extends Authenticatable
{
    protected $guarded = [];
    protected $table= 'pengguna';
    protected $hidden = ['password'];
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
    public function scopeSearch($query, $val)
    {
        return $query
        ->where('username','like','%'.$val.'%')
        ->Orwhere('role','like','%'.$val.'%')
        ;

    }
}
