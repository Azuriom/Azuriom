<?php

namespace Azuriom\Providers;

use Azuriom\Extensions\ExtensionFileLoader;
use Azuriom\Models\Page;
use Azuriom\Models\Post;
use Azuriom\Notifications\AlertNotificationChannel;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Translation\Translator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Override translator to use our own FileLoader for translating extensions
        $this->app->singleton('translator', function ($app) {
            $loader = new ExtensionFileLoader($app['files'], $app['path.lang']);
            $locale = $app['config']['app.locale'];

            $trans = new Translator($loader, $locale);
            $trans->setFallback($app['config']['app.fallback_locale']);

            return $trans;
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        JsonResource::withoutWrapping();

        Notification::extend('alert', fn () => new AlertNotificationChannel());

        // TODO : change default string length only on incompatible
        //  database versions (MySQL < 5.7.7 & MariaDB < 10.2)?
        Schema::defaultStringLength(191);

        Relation::enforceMorphMap([
            'posts' => Post::class,
            'pages' => Page::class,
        ]);
    }
}
