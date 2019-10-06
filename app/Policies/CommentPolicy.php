<?php

namespace Azuriom\Policies;

use Azuriom\Models\Comment;
use Azuriom\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine if the given user can create posts.
     *
     * @param  \Azuriom\Models\User  $user
     * @return bool
     */
    public function create(User $user)
    {
        return $user->can('comments.create');
    }

    /**
     * Determine if the given comment can be deleted by the user.
     *
     * @param  \Azuriom\Models\User  $user
     * @param  \Azuriom\Models\Comment  $comment
     * @return bool
     */
    public function delete(User $user, Comment $comment)
    {
        return $user->id === $comment->author_id || $user->can('comments.delete.other');
    }
}
