<?php

namespace Azuriom\Models;

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

    public function isAuthor(User $user)
    {
        return $this->author_id === $user->id;
    }

    /**
     * Get this post comments
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Get this post likes
     */
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function hasLiked(User $user)
    {
        return $this->likes->where('author_id', $user->id)->isNotEmpty();
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
