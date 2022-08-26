<?php

namespace Azuriom\Support;

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Filesystem\Filesystem;
use Throwable;

class Optimizer
{
    /**
     * The application instance.
     */
    protected Application $app;

    /**
     * The filesystem instance.
     */
    protected Filesystem $files;

    /**
     * The Artisan application instance.
     */
    protected Kernel $artisan;

    public function __construct(Application $app, Filesystem $files, Kernel $artisan)
    {
        $this->app = $app;
        $this->files = $files;
        $this->artisan = $artisan;
    }

    public function cache()
    {
        return $this->cacheRoutes() && $this->cacheConfig();
    }

    public function cacheRoutes()
    {
        $result = $this->artisan->call('route:cache');

        $this->removeFileFromOPCache($this->app->getCachedRoutesPath());

        return $result === 0;
    }

    public function cacheConfig()
    {
        $currentTheme = themes()->currentTheme();

        if ($currentTheme !== null) {
            // Disable current theme to prevent caching view paths
            themes()->changeTheme(null);
        }

        $result = $this->artisan->call('config:cache');

        $this->removeFileFromOPCache($this->app->getCachedConfigPath());

        if ($currentTheme !== null) {
            themes()->changeTheme($currentTheme);
        }

        return $result === 0;
    }

    public function clearRoutesCache()
    {
        $this->files->delete($this->app->getCachedRoutesPath());
    }

    public function clearConfigCache()
    {
        $this->files->delete($this->app->getCachedConfigPath());
    }

    public function clearViewCache()
    {
        $path = config('view.compiled');

        foreach ($this->files->glob("{$path}/*") as $view) {
            $this->files->delete($view);
        }
    }

    public function clear()
    {
        $this->clearConfigCache();
        $this->clearRoutesCache();
        $this->clearViewCache();
    }

    public function isConfigCached()
    {
        return $this->files->exists($this->app->getCachedConfigPath());
    }

    public function isEnabled()
    {
        return $this->app->routesAreCached() && $this->isConfigCached();
    }

    public function reloadRoutesCache()
    {
        if ($this->app->routesAreCached()) {
            $this->cacheRoutes();
        }
    }

    public function reload()
    {
        if ($this->isEnabled()) {
            $this->cache();
        }
    }

    public function removeFileFromOPCache(string $file)
    {
        if (! function_exists('opcache_invalidate')) {
            return false;
        }

        try {
            return opcache_invalidate($file);
        } catch (Throwable) {
            return false;
        }
    }
}
