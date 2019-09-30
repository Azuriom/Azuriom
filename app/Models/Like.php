<?php

namespace Azuriom\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $author_id
 * @property int $post_id
 * @property \Carbon\Carbon $created_at
 */
class Like extends Model
{
    const UPDATED_AT = null;

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = [
        'author',
    ];

    /**
     * Get the post of this like.
     */
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    /**
     * Get the author of this like.
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
