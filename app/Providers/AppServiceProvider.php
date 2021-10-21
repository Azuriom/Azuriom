<?php

namespace Azuriom\Providers;

use Azuriom\Models\Page;
use Azuriom\Models\Post;
use Azuriom\Notifications\AlertNotificationChannel;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Notification;
use Illuminate\Http\Resources\Json\JsonResource;



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
        Paginator::useBootstrap();

        JsonResource::withoutWrapping();

        Notification::extend('alert', function () {
            return new AlertNotificationChannel();
        });

        // TODO : change default string length only on incompatible
        //  database versions (MySQL < 5.7.7 & MariaDB < 10.2)?
        Schema::defaultStringLength(191);

        Relation::morphMap([
            'posts' => Post::class,
            'pages' => Page::class,
        ]);

        Event::listen(function (Registered $event) {
            $locales = get_selected_locales_codes();
            $locale = request()->session()->get('locale', $request->getPreferredLanguage($locales));
            app()->setLocale($locale);
            $event->user->locale = $locale;
            $event->user->save();
        });
    }
}
