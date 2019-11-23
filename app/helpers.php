<?php

use Illuminate\Support\Facades\Storage;

if (! function_exists('add_active')) {
    function add_active(string ...$patterns)
    {
        return Route::currentRouteNamed(...$patterns) ? 'active' : '';
    }
}

if (! function_exists('image_url')) {
    function image_url(string $name = '/')
    {
        return url(Storage::url('img/'.$name));
    }
}

if (! function_exists('color_contrast')) {
    function color_contrast(string $hex)
    {
        $r = hexdec(substr($hex, 1, 2));
        $g = hexdec(substr($hex, 3, 2));
        $b = hexdec(substr($hex, 5, 2));
        $yiq = (($r * 299) + ($g * 587) + ($b * 114)) / 1000;

        return ($yiq >= 128) ? 'black' : 'white';
    }
}

if (! function_exists('setting')) {
    function setting(string $name, $default = null)
    {
        return config('setting.'.$name, $default);
    }
}

if (! function_exists('favicon')) {
    function favicon()
    {
        $icon = setting('icon');
        return $icon !== null ? image_url($icon) : asset('img/azuriom.png');
    }
}

if (! function_exists('site_name')) {
    function site_name()
    {
        return setting('name', config('app.name'));
    }
}

if (! function_exists('theme_path')) {
    function theme_path($path = '')
    {
        return resource_path('themes/'.$path);
    }
}

if (! function_exists('plugin_path')) {
    function plugin_path($path = '')
    {
        return base_path('plugins/'.$path);
    }
}

if (! function_exists('game')) {
    function game()
    {
        return app('game');
    }
}
