<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * Fillable attributes for mass assignment.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'google_id', // Add google_id to the fillable attributes
        'avatar',    // Add avatar to the fillable attributes
        'last_login_at', // Add last_login_at to the fillable attributes
    ];

    /**
     * Hidden attributes for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
