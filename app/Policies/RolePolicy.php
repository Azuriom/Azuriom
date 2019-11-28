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
     *
     * @param  \Azuriom\Models\User  $user
     * @param  \Azuriom\Models\Role  $role
     * @return mixed
     */
    public function update(User $user, Role $role)
    {
        return $user->role->power > $role->power;
    }

    /**
     * Determine whether the user can delete the role.
     *
     * @param  \Azuriom\Models\User  $user
     * @param  \Azuriom\Models\Role  $role
     * @return mixed
     */
    public function delete(User $user, Role $role)
    {
        return $user->role->power > $role->power;
    }
}
