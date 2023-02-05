<?php

namespace Azuriom\Extensions\Plugin;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Contracts\Http\Kernel;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

abstract class BasePluginServiceProvider extends ServiceProvider
{
    use HasPlugin;

    /**
     * The plugin's global HTTP middleware stack.
     *
     * @var array
     */
    protected array $middleware = [];

    /**
     * The plugin's route middleware groups.
     *
     * @var array
     */
    protected array $middlewareGroups = [];

    /**
     * The plugin's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected array $routeMiddleware = [];

    /**
     * The policy mappings for this plugin.
     *
     * @var array
     */
    protected array $policies = [];

    /**
     * The router instance.
     *
     * @var \Illuminate\Routing\Router|null
     */
    protected Router|null $router;

    /**
     * Register any plugin services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        //
    }

    protected function registerMiddleware()
    {
        $this->registerMiddlewares();
    }

    protected function registerMiddlewares()
    {
        $this->middleware($this->middleware);

        $this->middlewareGroup($this->middlewareGroups);

        $this->routeMiddleware($this->routeMiddleware);
    }

    protected function registerPolicies()
    {
        foreach ($this->policies() as $key => $value) {
            Gate::policy($key, $value);
        }
    }

    protected function loadViews()
    {
        $viewsPath = $this->pluginResourcePath('views');

        $this->loadViewsFrom($viewsPath, $this->plugin->id);
    }

    protected function loadTranslations()
    {
        $langPath = $this->pluginResourcePath('lang');

        $this->loadTranslationsFrom($langPath, $this->plugin->id);
    }

    protected function loadMigrations()
    {
        $this->loadMigrationsFrom($this->pluginPath('database/migrations'));
    }

    protected function registerRouteDescriptions()
    {
        $this->app['plugins']->addRouteDescription(function () {
            return $this->routeDescriptions();
        });
    }

    protected function registerAdminNavigation()
    {
        $this->app['plugins']->addAdminNavItem(fn () => $this->adminNavigation());
    }

    protected function registerUserNavigation()
    {
        $this->app['plugins']->addUserNavItem(fn () => $this->userNavigation());
    }

    protected function middleware($middleware, bool $before = false)
    {
        $kernel = $this->app->make(Kernel::class);

        foreach ((array) $middleware as $value) {
            if ($before) {
                $kernel->prependMiddleware($value);
            } else {
                $kernel->pushMiddleware($value);
            }
        }
    }

    protected function middlewareGroup(string|array $name, $middleware = null)
    {
        $middlewares = is_array($name) ? $name : [$name => $middleware];

        foreach ($middlewares as $key => $class) {
            $this->router->middlewareGroup($key, $class);
        }
    }

    protected function routeMiddleware(string|array $name, $middleware = null)
    {
        $middlewares = is_array($name) ? $name : [$name => $middleware];

        foreach ($middlewares as $key => $class) {
            $this->router->aliasMiddleware($key, $class);
        }
    }

    protected function registerSchedule()
    {
        if ($this->app->runningInConsole()) {
            $this->app->booted(function () {
                $this->schedule($this->app->make(Schedule::class));
            });
        }
    }

    /**
     * Returns the routes that should be able to be added to the navbar.
     *
     * @return array
     */
    protected function routeDescriptions()
    {
        return [];
    }

    /**
     * Return the admin navigations routes to register in the dashboard.
     *
     * @return array
     */
    protected function adminNavigation()
    {
        return [];
    }

    /**
     * Return the user navigations routes to register in user menu.
     *
     * @return array
     */
    protected function userNavigation()
    {
        return [];
    }

    /**
     * Return the policies to register.
     *
     * @return array
     */
    public function policies()
    {
        return $this->policies;
    }

    protected function pluginPath($path = '')
    {
        return $this->app['plugins']->path($this->plugin->id, $path);
    }

    protected function pluginResourcePath($path = '')
    {
        return $this->pluginPath('resources/'.$path);
    }
}
