<?php

namespace Azuriom\Providers;

use Azuriom\Models\Page;
use Azuriom\Models\Post;
use Azuriom\Notifications\AlertNotificationChannel;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        JsonResource::withoutWrapping();

        Notification::extend('alert', function () {
            return new AlertNotificationChannel();
        });

        // TODO : change default string length only on incompatible
        //  versions of database (MySQL < 5.7.7 & MariaDB < 10.2) ?
        Schema::defaultStringLength(191);

        Relation::morphMap([
           'posts' => Post::class,
           'pages' => Page::class,
        ]);
    }
}
