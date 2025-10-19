<?php

namespace Azuriom\Games;

use Azuriom\Models\User;

abstract class Game
{
    /**
     * The primary attribute that should be used when searching for a user, currently used in
     * money transfer (in user profile, if enabled) and in some plugins.
     */
    protected UserAttribute $userPrimaryAttribute = UserAttribute::NAME;

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
     * @deprecated Will be removed in 1.0, use User::getAvatar()
     */
    abstract public function getAvatarUrl(User $user, int $size = 64);

    /**
     * Get the game id of the user.
     *
     * @return string|null
     */
    abstract public function getUserUniqueId(string $name);

    /**
     * Get the game username of the user.
     *
     * @return string|null
     */
    abstract public function getUserName(User $user);

    /**
     * Get the translation for a given key.
     *
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

    public function userPrimaryAttributeName(): string
    {
        return $this->userPrimaryAttribute === UserAttribute::NAME
            ? trans('auth.name')
            : $this->trans('id');
    }

    public function userPrimaryAttribute(): UserAttribute
    {
        return $this->userPrimaryAttribute;
    }
}
