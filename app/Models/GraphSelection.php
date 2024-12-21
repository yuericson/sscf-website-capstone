<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GraphSelection extends Model
{
    use HasFactory;

    protected $fillable = ['graph_name', 'is_displayed'];
}
