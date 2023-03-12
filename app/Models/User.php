<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    protected $table = 'users';

    protected $fillable = [
        'name',
        'surnames',
        'dni',
        'email',
        'phone',
        'country',
        'over_you',
        'iban'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

}