<?php

namespace Azuriom\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    const UPDATED_AT = null;

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = [
        'author'
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
