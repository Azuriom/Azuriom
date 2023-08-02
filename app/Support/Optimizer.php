<?php

namespace Azuriom\Support;

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Filesystem\Filesystem;
use Throwable;

class Optimizer
{
    protected Application $app;

    protected Filesystem $files;

    protected Kernel $artisan;

    public function __construct(Application $app, Filesystem $files, Kernel $artisan)
    {
        $this->app = $app;
        $this->files = $files;
        $this->artisan = $artisan;
    }

    public function cache(): bool
    {
        return $this->cacheRoutes() && $this->cacheConfig();
    }

    public function cacheRoutes(): bool
    {
        $result = $this->artisan->call('route:cache');

        $this->removeFileFromOPCache($this->app->getCachedRoutesPath());

        return $result === 0;
    }

    public function cacheConfig(): bool
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

    public function clearRoutesCache(): void
    {
        $this->files->delete($this->app->getCachedRoutesPath());
    }

    public function clearConfigCache(): void
    {
        $this->files->delete($this->app->getCachedConfigPath());
    }

    public function clearViewCache(): void
    {
        $path = config('view.compiled');

        foreach ($this->files->glob($path.'/*') as $view) {
            $this->files->delete($view);
        }
    }

    public function clear(): void
    {
        $this->clearConfigCache();
        $this->clearRoutesCache();
        $this->clearViewCache();
    }

    public function isConfigCached(): bool
    {
        return $this->files->exists($this->app->getCachedConfigPath());
    }

    public function isEnabled(): bool
    {
        return $this->app->routesAreCached() && $this->isConfigCached();
    }

    public function reloadRoutesCache(): void
    {
        if ($this->app->routesAreCached()) {
            $this->cacheRoutes();
        }
    }

    public function reload(): void
    {
        if ($this->isEnabled()) {
            $this->cache();
        }
    }

    public function removeFileFromOPCache(string $file): bool
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
