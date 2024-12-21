<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidateImage extends Model
{
    use HasFactory;

    protected $table = 'candidate_images';

    protected $fillable = ['subtitle_id', 'name', 'image_path'];

    public function subtitle()
    {
        return $this->belongsTo(LocalSubtitle::class, 'subtitle_id');
    }
}
