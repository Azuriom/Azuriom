<?php

namespace Azuriom\Support;

use Illuminate\Contracts\Console\Kernel as Console;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Filesystem\Filesystem;

class Optimizer
{
    /**
     * The application instance.
     *
     * @var \Illuminate\Contracts\Foundation\Application
     */
    protected $app;

    /**
     * The filesystem instance.
     *
     * @var \Illuminate\Filesystem\Filesystem
     */
    protected $files;

    /**
     * The Artisan application instance.
     *
     * @var \Illuminate\Contracts\Console\Kernel
     */
    protected $artisan;

    public function __construct(Application $app, Filesystem $files, Console $artisan)
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
        $result = $this->artisan->call('config:cache');

        $this->removeFileFromOPCache($this->app->getCachedConfigPath());

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

        return opcache_invalidate($file);
    }
}
