<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryVideo extends Model
{
    use HasFactory;

    protected $table = 'gallery_video';

    protected $fillable = ['gallery_album_id', 'title', 'url', 'description', 'path'];

    public function galleryAlbum()
    {
        return $this->belongsTo(GalleryAlbum::class, 'gallery_album_id');
    }
}
