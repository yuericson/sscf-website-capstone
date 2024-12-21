<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SportsRegistration extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'email',
        'age',
        'gender',
        'year_level',
        'course',
        'college_campus',
        'sports_event',
        'id_number',
        'image',
    ];
}
