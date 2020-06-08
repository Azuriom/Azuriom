<?php

namespace Azuriom\Policies;

use Azuriom\Models\Comment;
use Azuriom\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can create comments.
     *
     * @param  \Azuriom\Models\User  $user
     * @return bool
     */
    public function create(User $user)
    {
        return $user->can('comments.create');
    }

    /**
     * Determine whether the user can delete the comment.
     *
     * @param  \Azuriom\Models\User  $user
     * @param  \Azuriom\Models\Comment  $comment
     * @return bool
     */
    public function delete(User $user, Comment $comment)
    {
        return $user->is($comment->author) || $user->can('comments.delete.other');
    }
}
