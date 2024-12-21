<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Judge extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'username',
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function pageants()
    {
        return $this->belongsToMany(Pageant::class, 'judge_pageant');
    }

    public function scores()
    {
        return $this->hasMany(Score::class);
    }
}
