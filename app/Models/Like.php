<?php

namespace Azuriom\Models;

use Azuriom\Models\Traits\HasUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $post_id
 * @property int $author_id
 * @property \Carbon\Carbon $created_at
 * @property \Azuriom\Models\Post $post
 * @property \Azuriom\Models\User $author
 */
class Like extends Model
{
    use HasFactory;
    use HasUser;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The user key associated with this model.
     *
     * @var string
     */
    protected $userKey = 'author_id';

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
