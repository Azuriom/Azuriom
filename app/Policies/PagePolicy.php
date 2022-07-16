<?php

namespace Azuriom\Policies;

use Azuriom\Models\Page;
use Azuriom\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PagePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the post.
     *
     * @param  \Azuriom\Models\User|null  $user
     * @param  \Azuriom\Models\Page  $page
     * @return mixed
     */
    public function view(?User $user, Page $page)
    {
        abort_if(! $page->is_enabled, 404);

        if ($page->isRestricted()) {
            return $user !== null && $page->roles->contains($user->role);
        }

        return true;
    }
}
