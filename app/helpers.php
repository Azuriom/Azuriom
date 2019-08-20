<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

if (! function_exists('add_active')) {
    function add_active(...$patterns)
    {
        return Route::currentRouteNamed(...$patterns) ? 'active' : '';
    }
}

if (! function_exists('image_url')) {
    function image_url(string $name)
    {
        return url(Storage::url('img/'.$name));
    }
}

if (! function_exists('request_checkbox')) {
    function request_checkbox(Request $request, string $name)
    {
        $request->offsetSet($name, $request->has($name));
    }
}
