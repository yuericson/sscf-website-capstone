<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LatestNews extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     */
    protected $table = 'latest_news';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'title',
        'date',
        'content',
        'image_path',
    ];
}
