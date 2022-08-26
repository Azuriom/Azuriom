<?php

namespace Azuriom\Providers;

use Azuriom\Http\View\Composers\AdminLayoutComposer;
use Azuriom\Http\View\Composers\NavbarComposer;
use Azuriom\Http\View\Composers\NotificationComposer;
use Azuriom\Http\View\Composers\ServerComposer;
use Azuriom\View\ThemeViewFinder;
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
        $this->app->bind('view.finder', function ($app) {
            return new ThemeViewFinder($app['files'], $app['config']['view.paths']);
        });

        Blade::if('plugin', fn ($expression) => plugins()->isEnabled($expression));
        Blade::if('route', fn ($expression) => Route::is($expression));

        View::composer('*', ServerComposer::class);
        View::composer('*', NotificationComposer::class);
        View::composer('elements.navbar', NavbarComposer::class);
        View::composer('admin.layouts.admin', AdminLayoutComposer::class);
    }
}
