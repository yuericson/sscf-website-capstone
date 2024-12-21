<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Criteria extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        'weight',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function scores()
    {
        return $this->hasMany(Score::class);
    }
}
