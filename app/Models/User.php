<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class User extends Authenticable
{
    use HasApiTokens, Notifiable;


    protected $fillable = [

    ];
}
