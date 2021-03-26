<?php

namespace Azuriom\Games;

use Azuriom\Models\User;

abstract class Game
{
    /**
     * Get the id of this game.
     *
     * @return string
     */
    abstract public function id();

    /**
     * Get the name of this game.
     *
     * @return string
     */
    abstract public function name();

    /**
     * Get the avatar URL of the user.
     *
     * @param  \Azuriom\Models\User  $user
     * @param  int  $size
     *
     * @deprecated Will be removed in 1.0, use User::getAvatar()
     */
    abstract public function getAvatarUrl(User $user, int $size = 64);

    /**
     * Get the game id of the user.
     *
     * @param  string  $name
     */
    abstract public function getUserUniqueId(string $name);

    /**
     * Get the game user name.
     *
     * @param  \Azuriom\Models\User  $user
     * @return mixed
     */
    abstract public function getUserName(User $user);

    /**
     * Get the translation for a given key.
     *
     * @param  string  $key
     * @param  array  $placeholders
     * @return string
     */
    public function trans(string $key, array $placeholders = [])
    {
        return $key;
    }

    /**
     * Return if the user must login with a third party provider.
     *
     * @return bool
     */
    public function loginWithOAuth()
    {
        return $this->getSocialiteDriverName() !== null;
    }

    /**
     * Get the socialite driver name, if loginWithSocialite return true.
     *
     * @return string|null
     */
    public function getSocialiteDriverName()
    {
        return null;
    }

    /**
     * Get the supported server bridge types.
     *
     * @return \Azuriom\Games\ServerBridge[]
     */
    abstract public function getSupportedServers();

    /**
     * Determine if an extension is compatible based on their supported games.
     *
     * @param  string[]  $supportedGames
     * @return bool
     */
    public function isExtensionCompatible(array $supportedGames)
    {
        return in_array($this->id(), $supportedGames, true);
    }
}
