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
     *
     * @param  \Azuriom\Models\User|null  $user
     * @param  \Azuriom\Models\Post  $post
     * @return mixed
     */
    public function view(?User $user, Post $post)
    {
        if (! $post->isPublished()) {
            abort(404);

            return false;
        }

        return true;
    }
}
