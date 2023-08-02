<?php

namespace Azuriom\Extensions\Plugin;

use Illuminate\Support\ServiceProvider;

abstract class BaseRouteServiceProvider extends ServiceProvider
{
    use HasPlugin;

    /**
     * Define the routes for the plugin.
     */
    abstract public function loadRoutes();

    /**
     * Bootstrap any plugin services.
     */
    public function boot(): void
    {
        if (! $this->app->routesAreCached()) {
            $this->loadRoutes();
        }
    }
}
