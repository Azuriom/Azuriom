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
    public function getAvatarUrl(User $user);
}
