<?php

namespace Azuriom\Providers;

use Azuriom\Extensions\ExtensionFileLoader;
use Azuriom\Models\Page;
use Azuriom\Models\Post;
use Azuriom\Models\User;
use Azuriom\Notifications\AlertNotificationChannel;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Translation\Translator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Override translator to use our own FileLoader for translating extensions
        $loader = new ExtensionFileLoader($this->app['files'], $this->app['path.lang']);
        $translator = new Translator($loader, $this->app['config']['app.locale']);
        $translator->setFallback($this->app['config']['app.fallback_locale']);

        $this->app->instance('translator', $translator);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();

        JsonResource::withoutWrapping();

        Notification::extend('alert', fn () => new AlertNotificationChannel());

        // TODO : change default string length only on incompatible
        //  database versions (MySQL < 5.7.7 & MariaDB < 10.2)?
        Schema::defaultStringLength(191);

        Relation::enforceMorphMap([
            'posts' => Post::class,
            'pages' => Page::class,
            'users' => User::class,
        ]);

        Gate::before(function (User $user, string $ability, array $arguments) {
            if ($user->isAdmin()) {
                return true;
            }

            if (empty($arguments)) {
                return $user->role->hasRawPermission($ability);
            }
        });
    }
}
