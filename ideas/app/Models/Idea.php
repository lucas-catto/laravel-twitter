<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    // remove all check
    // protected $guarded = [];

    protected $guarded = [
        'id',
        'create_at',
        'update_at'
    ];

    protected $fillable = [
        'user_id',
        'content',
        'likes'
    ];

    public function comments()
    {
        return $this->hasMany(\App\Models\Comment::class, 'idea_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
 