<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'content', 'publish_at', 'publish_now', 'published'];


    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function setPublishNowAttribute($value)
    {
        $this->attributes['publish_now'] = $value === 'true' || $value === true;
    }
}

