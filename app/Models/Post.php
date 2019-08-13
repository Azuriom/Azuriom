<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'slug', 'content',
    ];

    /**
     * Get the author of this post.
     */
    public function author() {
        return $this->belongsTo(User::class, 'author_id');
    }
}
