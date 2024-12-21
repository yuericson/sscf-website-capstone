<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocalSubtitle extends Model
{
    use HasFactory;

    protected $table = 'local_subtitles';

    protected $fillable = ['section_id', 'title'];

    public function section()
    {
        return $this->belongsTo(LocalSection::class, 'section_id');
    }

    // Renamed relationship from 'candidates' to 'electionimages' for clarity
    public function electionimages()
    {
        return $this->hasMany(CandidateImage::class, 'subtitle_id');
    }
}
