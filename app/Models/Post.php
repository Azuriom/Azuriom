<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'slug', 'content', 'published_at'
    ];

    protected $dates = [
        'published_at'
    ];

    /**
     * Get the author of this post.
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function isPublished()
    {
        return $this->published_at->isPast();
    }

    public function scopePublished(Builder $query)
    {
        return $query->where('published_at', '<=', now())->orderBy('published_at');
    }
}
