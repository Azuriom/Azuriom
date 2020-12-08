<?php

namespace Azuriom\Models;

use Azuriom\Models\Traits\HasMarkdown;
use Azuriom\Models\Traits\HasUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * @property int $id
 * @property int $post_id
 * @property int $author_id
 * @property string $content
 * @property string $locale
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @property \Azuriom\Models\Post $post
 * @property \Azuriom\Models\User $author
 */
class Comment extends Model
{
    use HasFactory;
    use HasMarkdown;
    use HasUser;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'content',
    ];

    /**
     * The user key associated with this model.
     *
     * @var string
     */
    protected $userKey = 'author_id';

    protected static function booted()
    {
        static::addGlobalScope('localized', function (Builder $builder) {
            $builder->where('locale', app()->getLocale());
        });
    }

    /**
     * Get the post of this comment.
     */
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    /**
     * Get the author of this comment.
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function parseContent()
    {
        return $this->parseMarkdown('content', true);
    }
}
