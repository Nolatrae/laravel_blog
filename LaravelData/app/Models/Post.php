<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'content'];
    
    protected $casts = [
        'published' => 'boolean',
    ];

    protected $dates = ['published_at', 'deleted_at'];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeTitleContains($query, $searchTerm)
    {
        return $query->where('title', 'like', "%{$searchTerm}%");
    }
}
