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
     * @param  \Azuriom\Models\User  $user
     * @param  \Azuriom\Models\Page  $page
     * @return mixed
     */
    public function view(?User $user, Page $page)
    {
        if (! $page->is_enabled) {
            abort(404);

            return false;
        }

        return true;
    }
}
