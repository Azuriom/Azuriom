<?php

namespace Azuriom\Policies;

use Azuriom\Models\Post;
use Azuriom\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the post.
     */
    public function view(?User $user, Post $post): bool
    {
        abort_if(! $post->isPublished(), 404);

        return true;
    }
}
