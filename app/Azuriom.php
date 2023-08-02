<?php

namespace Azuriom;

class Azuriom
{
    /**
     * The Azuriom CMS version.
     *
     * @var string
     */
    private const VERSION = '1.0.17';

    /**
     * Get the current version of Azuriom CMS.
     */
    public static function version(): string
    {
        return static::VERSION;
    }
}
