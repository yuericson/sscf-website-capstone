<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForumPost extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'status', 'user_id'];

    /**
     * Iugnay ang ForumPost sa User na gumawa nito.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Iugnay ang ForumPost sa mga Comments nito.
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Iugnay ang ForumPost sa mga Reactions nito.
     */
    public function reactions()
    {
        return $this->hasMany(Reaction::class);
    }
}
