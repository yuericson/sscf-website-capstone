<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryAlbum extends Model
{
    use HasFactory;

    protected $table = 'gallery_album';

    protected $fillable = ['name', 'icon', 'description'];

    public function galleryImages()
    {
        return $this->hasMany(GalleryImage::class, 'gallery_album_id');
    }

    public function galleryVideos()
    {
        return $this->hasMany(GalleryVideo::class, 'gallery_album_id');
    }
}
