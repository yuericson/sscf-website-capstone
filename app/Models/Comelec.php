<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Comelec extends Authenticatable
{
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
