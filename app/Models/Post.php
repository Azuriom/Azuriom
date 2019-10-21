<?php

namespace Azuriom\Models;

use Azuriom\Models\Traits\HasUser;
use Azuriom\Models\Traits\Loggable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $author_id
 * @property int|null $image_id
 * @property string $title
 * @property string $description
 * @property string $slug
 * @property string $content
 * @property bool $is_pinned
 * @property \Carbon\Carbon $published_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @property \Azuriom\Models\User $author
 * @property \Azuriom\Models\Image|null $image
 * @property \Illuminate\Support\Collection|\Azuriom\Models\Comment[] $comments
 * @property \Illuminate\Support\Collection|\Azuriom\Models\Like[] $likes
 */
class Post extends Model
{
    use Loggable, HasUser;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'image_id', 'title', 'description', 'slug', 'content', 'is_pinned', 'published_at',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_pinned' => 'boolean',
        'published_at' => 'datetime',
    ];

    /**
     * The user key associated with this model.
     *
     * @var string
     */
    protected $userKey = 'author_id';

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

    public function hasLiked(User $user = null)
    {
        return $this->likes->where('author_id', $user ? $user->id : auth()->id())->isNotEmpty();
    }

    public function isPublished()
    {
        return $this->published_at->isPast();
    }

    public function scopePublished(Builder $query)
    {
        return $query->whereDate('published_at', '<=', now());
    }
}
