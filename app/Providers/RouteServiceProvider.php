<?php

namespace Azuriom\Providers;

use Azuriom\Http\Controllers\FallbackController;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        Route::pattern('id', '[0-9]+');
        Route::pattern('slug', '[a-z0-9-]+');
        Route::pattern('name', '[a-z0-9_-]+');

        $this->configureRateLimiting();

        $this->routes(function () {
            Route::get('/storage/{path}', [FallbackController::class, 'storage'])
                ->where('path', '.*');

            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('admin-access')
                ->prefix('admin')
                ->name('admin.')
                ->group(base_path('routes/admin.php'));

            if (! is_installed()) {
                Route::prefix('install')
                    ->name('install.')
                    ->group(base_path('routes/install.php'));
            }

            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });
    }

    /**
     * Configure the rate limiters for the application.
     */
    protected function configureRateLimiting(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.2fa.id'));
        });
    }
}
