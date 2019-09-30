<?php

namespace Azuriom\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $author_id
 * @property int $image_id
 * @property string $title
 * @property string $description
 * @property string $slug
 * @property string $content
 * @property bool $is_pinned
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class Post extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'image_id', 'title', 'description', 'slug', 'content', 'is_pinned', 'published_at',
    ];

    protected $dates = [
        'published_at',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_pinned' => 'boolean',
    ];

    /**
     * Get the author of this post.
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    /**
     * Get the image of this post.
     */
    public function image()
    {
        return $this->belongsTo(Image::class);
    }

    /**
     * Get this post comments.
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Get this post likes.
     */
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function hasLiked(User $user)
    {
        return $this->likes->where('author_id', $user->id)->isNotEmpty();
    }

    public function isAuthor(User $user)
    {
        return $this->author_id === $user->id;
    }

    public function isPublished()
    {
        return $this->published_at->isPast();
    }

    public function scopePublished(Builder $query)
    {
        return $query->where('published_at', '<=', now());
    }
}
