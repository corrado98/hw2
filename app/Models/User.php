<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    protected $fillable = [
        'name',
        'password',
        'surname',
        'username',
        'email'
    ];

    public $timestamps= false;

    public function pref(){
    return $this->belongsToMany('App/Models/Pref');
    }
      
}
