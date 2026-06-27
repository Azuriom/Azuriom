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
     */
    function asset(string $path, ?bool $secure = null): string
    {
        if (str_starts_with($path, 'assets/') || str_starts_with($path, 'build/assets/')) {
            return app('url')->asset($path, $secure);
        }

        // Ignore if there is already a query string
        $query = str_contains($path, '?') ? '' : '?v'.Azuriom::version();

        return app('url')->asset('assets/'.$path.$query, $secure);
    }
}
