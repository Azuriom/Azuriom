<?php

use Azuriom\Azuriom;

/*
|--------------------------------------------------------------------------
| Base helpers
|--------------------------------------------------------------------------
|
| Here is where are registered the helpers that should override a Laravel
| helper because this file is load before the entire framework.
|
*/

if (! function_exists('asset')) {
    /**
     * Generate an asset path for the application.
     *
     * @param  string  $path
     * @param  bool|null  $secure
     * @return string
     */
    function asset(string $path, $secure = null)
    {
        // Ignore if there is already a query string
        $query = str_contains($path, '?') ? '' : '?v'.Azuriom::version();

        return app('url')->asset('assets/'.$path.$query, $secure);
    }
}
