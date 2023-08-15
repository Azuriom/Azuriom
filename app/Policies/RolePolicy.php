<?php

namespace Azuriom\Policies;

use Azuriom\Models\Role;
use Azuriom\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can update the role.
     */
    public function update(User $user, Role $role): bool
    {
        return $user->role->power > $role->power;
    }

    /**
     * Determine whether the user can delete the role.
     */
    public function delete(User $user, Role $role): bool
    {
        return $user->role->power > $role->power;
    }
}
