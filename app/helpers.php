<?php

if (! function_exists('add_active')) {
    function add_active(...$patterns)
    {
        return Route::currentRouteNamed(...$patterns) ? 'active' : '';
    }
}
