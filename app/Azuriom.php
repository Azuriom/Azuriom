<?php

namespace Azuriom;

class Azuriom
{
    /**
     * The Azuriom CMS version.
     *
     * @var string
     */
    private const VERSION = '0.1.2';

    /**
     * Get the current version of Azuriom CMS.
     *
     * @return string
     */
    public static function version()
    {
        return static::VERSION;
    }
}
