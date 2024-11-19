<?php

namespace Azuriom;

use Illuminate\Support\Str;

class Azuriom
{
    /**
     * The Azuriom CMS version.
     *
     * @var string
     */
    private const VERSION = '1.2.3';

    /**
     * Get the current version of Azuriom CMS.
     */
    public static function version(): string
    {
        return static::VERSION;
    }

    /**
     * Get the current API version, for extensions, of Azuriom CMS.
     */
    public static function apiVersion(): string
    {
        return Str::beforeLast(static::VERSION, '.');
    }
}
