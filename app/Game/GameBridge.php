<?php

namespace Azuriom\Game;

use Azuriom\Models\User;

interface GameBridge
{
    /**
     * Get the avatar URL of the user.
     *
     * @param  User  $user
     */
    function getAvatarUrl(User $user);
}
