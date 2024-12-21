<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['forum_post_id', 'user_id', 'content'];

    /**
     * Iugnay ang Comment sa kaukulang ForumPost.
     */
    public function forumPost()
    {
        return $this->belongsTo(ForumPost::class);
    }

    /**
     * Iugnay ang Comment sa User na gumawa nito.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
