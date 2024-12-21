<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pageant extends Model
{
    // Include 'status' in the fillable array
    protected $fillable = [
        'name',
        'gender',
        'description',
        'date',
        'status', // Added status here
    ];

    /**
     * The judges that belong to the pageant.
     */
    public function judges()
    {
        return $this->belongsToMany(Judge::class, 'judge_pageant');
    }

    /**
     * The categories associated with the pageant.
     */
    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    /**
     * The participants in the pageant.
     */
    public function participants()
    {
        return $this->hasMany(Participant::class);
    }
}
