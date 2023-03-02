<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;


    //protected $table = 'users';

    protected $primaryKey = "user_id";

    protected $fillable = [
        'user_id',
        'name',
        'surnames',
        'dni',
        'email',
        'phone',
        'country',
        'over_you'
    ];

    protected $hidden = [
        'password',
        'iban'
    ];


    public function getUsers()
    {
        return User::all();
    }

    public function getUserById($id)
    {
        return User::find($id);
    }
}