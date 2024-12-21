<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    protected $fillable = [
        'pageant_id',
        'name',
        'gender',
    ];

    public function pageant()
    {
        return $this->belongsTo(Pageant::class);
    }

    public function scores()
    {
        return $this->hasMany(Score::class);
    }
}
