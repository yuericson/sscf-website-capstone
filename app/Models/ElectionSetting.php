<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ElectionSetting extends Model
{
    protected $fillable = ['start_time', 'end_time'];
}
