<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reaction extends Model
{
    use HasFactory;

    protected $fillable = ['forum_post_id', 'user_id', 'type'];

    /**
     * Iugnay ang Reaction sa kaukulang ForumPost.
     */
    public function forumPost()
    {
        return $this->belongsTo(ForumPost::class);
    }

    /**
     * Iugnay ang Reaction sa User na gumawa nito.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
