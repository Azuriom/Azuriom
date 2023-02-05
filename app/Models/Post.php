<?php

namespace Azuriom\Models;

use Azuriom\Models\Traits\Attachable;
use Azuriom\Models\Traits\HasImage;
use Azuriom\Models\Traits\HasUser;
use Azuriom\Models\Traits\Loggable;
use Azuriom\Support\Discord\DiscordWebhook;
use Azuriom\Support\Discord\Embed;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

/**
 * @property int $id
 * @property int $author_id
 * @property string|null $image
 * @property string $title
 * @property string $description
 * @property string $slug
 * @property string $content
 * @property bool $is_pinned
 * @property \Carbon\Carbon $published_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \Azuriom\Models\User $author
 * @property \Illuminate\Support\Collection|\Azuriom\Models\Comment[] $comments
 * @property \Illuminate\Support\Collection|\Azuriom\Models\Like[] $likes
 *
 * @method static \Illuminate\Database\Eloquent\Builder published()
 */
class Post extends Model
{
    use Attachable;
    use HasFactory;
    use HasImage;
    use HasUser;
    use Loggable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'slug', 'content', 'is_pinned', 'published_at',
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
     * Get this post comments.
     */
    public function comments()
    {
        return $this->hasMany(Comment::class)->latest();
    }

    /**
     * Get this post likes.
     */
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function isLiked(User $user = null)
    {
        if ($user === null && Auth::guest()) {
            return false;
        }

        $userId = $user?->id ?? Auth::id();

        if ($this->relationLoaded('likes')) {
            return $this->likes->contains('author_id', $userId);
        }

        return $this->likes()->where('author_id', $userId)->exists();
    }

    public function isPublished()
    {
        return $this->published_at->isPast();
    }

    public function getImageSize()
    {
        try {
            return $this->getImageDisk()->size($this->getImagePath());
        } catch (Exception) {
            return 0;
        }
    }

    public function createDiscordWebhook()
    {
        $embed = Embed::create()
            ->title($this->title)
            ->description($this->description)
            ->author($this->author->name, null, $this->author->getAvatar())
            ->color('#004de6')
            ->url(route('posts.show', $this))
            ->timestamp($this->published_at);

        if ($this->hasImage()) {
            $embed->image($this->imageUrl());
        }

        return DiscordWebhook::create()->addEmbed($embed);
    }

    /**
     * Scope a query to only include published posts.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePublished(Builder $query)
    {
        return $query->where('published_at', '<=', now());
    }
}
