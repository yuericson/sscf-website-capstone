<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    protected $fillable = [
        'judge_id',
        'participant_id',
        'criteria_id',
        'score',
    ];

    public function judge()
    {
        return $this->belongsTo(Judge::class);
    }

    public function participant()
    {
        return $this->belongsTo(Participant::class);
    }

    public function criteria()
    {
        return $this->belongsTo(Criteria::class, 'criteria_id', 'id');
    }
}
