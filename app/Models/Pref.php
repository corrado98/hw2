<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Pref extends Authenticatable
{
    protected $fillable = [
        'user',
        'evento',
        'luogo',
        'data',
        'ora',
        'immagine',
        'info'
    ];

    public $timestamps= false;

    public function user() {
    return $this->belongsToMany('App/Models/User');
    }
      
}