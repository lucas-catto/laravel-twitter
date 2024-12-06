<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    protected $fillable = [
        'content',
        'likes'
    ];

    public function comments()
    {
        return $this->hasMany(\App\Models\Comment::class, 'idea_id', 'id');
    }
}
