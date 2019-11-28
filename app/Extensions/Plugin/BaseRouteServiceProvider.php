<?php

namespace Azuriom\Extensions\Plugin;

use Illuminate\Support\ServiceProvider;

abstract class BaseRouteServiceProvider extends ServiceProvider
{
    use HasPlugin;

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    abstract public function loadRoutes();

    /**
     * Bootstrap any plugin services.
     *
     * @return void
     */
    public function boot()
    {
        if (! $this->app->routesAreCached()) {
            $this->loadRoutes();
        }
    }
}
