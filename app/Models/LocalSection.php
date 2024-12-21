<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocalSection extends Model
{
    use HasFactory;

    protected $table = 'local_sections';

    protected $fillable = ['title'];

    public function subtitles()
    {
        return $this->hasMany(LocalSubtitle::class, 'section_id');
    }
}
