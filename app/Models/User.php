<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;
    
    public $timestamps = false;

    protected $table = 'user';

    protected $fillable = [
        'id',
        'name',
        'password',
        'email'
    ];
}
