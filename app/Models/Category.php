<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'pageant_id',
        'name',
    ];

    public function pageant()
    {
        return $this->belongsTo(Pageant::class);
    }

    public function criteria()
    {
        return $this->hasMany(Criteria::class);
    }
}
