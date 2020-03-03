<?php

namespace Azuriom\Extensions\Plugin;

use Illuminate\Contracts\Http\Kernel;
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
    protected $middleware = [];

    /**
     * The plugin's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [];

    /**
     * The plugin's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [];

    /**
     * The policy mappings for this plugin.
     *
     * @var array
     */
    protected $policies = [];

    /**
     * The router instance.
     *
     * @var \Illuminate\Routing\Router
     */
    protected $router;

    /**
     * Register any plugin services.
     *
     * @return void
     */
    public function register()
    {
        //
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

    protected function loadFactories()
    {
        $this->loadFactoriesFrom($this->pluginPath('database/factories'));
    }

    protected function registerRouteDescriptions()
    {
        $this->app['plugins']->addRouteDescription($this->routeDescriptions());
    }

    protected function registerAdminNavigation()
    {
        $this->app['plugins']->addAdminNavItem($this->adminNavigation());
    }

    protected function middleware($middleware, bool $before = false)
    {
        $middlewares = is_array($middleware) ? $middleware : [$middleware];

        $kernel = $this->app->make(Kernel::class);

        foreach ($middlewares as $middleware) {
            if ($before) {
                $kernel->prependMiddleware($middleware);
            } else {
                $kernel->pushMiddleware($middleware);
            }
        }
    }

    protected function middlewareGroup($name, $middleware = null)
    {
        $middlewares = is_array($name) ? $name : [$name => $middleware];

        foreach ($middlewares as $key => $middleware) {
            $this->router->middlewareGroup($key, $middleware);
        }
    }

    protected function routeMiddleware($name, $middleware = null)
    {
        $middlewares = is_array($name) ? $name : [$name => $middleware];

        foreach ($middlewares as $key => $middleware) {
            $this->router->aliasMiddleware($key, $middleware);
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
