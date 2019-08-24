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
     * Get the author of this comment.
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
