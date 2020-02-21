<?php

namespace Azuriom\Providers;

use Azuriom\Http\View\Composers\AdminLayoutComposer;
use Azuriom\Http\View\Composers\NavbarComposer;
use Azuriom\Http\View\Composers\ServerComposer;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::if('plugin', function ($expression) {
            return plugins()->isEnabled($expression);
        });

        Blade::if('route', function ($expression) {
            return Route::currentRouteNamed($expression);
        });

        View::composer('*', ServerComposer::class);
        View::composer('elements.navbar', NavbarComposer::class);
        View::composer('admin.layouts.admin', AdminLayoutComposer::class);
    }
}
