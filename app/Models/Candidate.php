<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'position_id',
        'college_id',
    ];

    // Relationships
    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function college()
    {
        return $this->belongsTo(College::class);
    }

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }
}
