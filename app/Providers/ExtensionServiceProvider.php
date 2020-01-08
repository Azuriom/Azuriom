<?php

namespace Azuriom\Providers;

use Azuriom\Extensions\Plugin\PluginManager;
use Azuriom\Extensions\Theme\ThemeManager;
use Illuminate\Support\ServiceProvider;

class ExtensionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function register()
    {
        $plugins = $this->app->make(PluginManager::class);

        $this->app->instance('plugins', $plugins);
        $this->app->alias('plugins', PluginManager::class);

        $this->app->instance('themes', $this->app->make(ThemeManager::class));
        $this->app->alias('themes', ThemeManager::class);

        $plugins->loadPlugins($this->app);
    }

    /**
     * Bootstrap services.
     *
     * @param  \Azuriom\Extensions\Theme\ThemeManager  $themes
     * @return void
     */
    public function boot(ThemeManager $themes)
    {
        $theme = setting('theme');

        if ($theme === null) {
            return;
        }

        $themes->loadTheme($theme);

        $themeLangPath = $themes->path('lang', $theme);

        if (is_dir($themeLangPath)) {
            $this->loadTranslationsFrom($themeLangPath, 'theme');
        }
    }
}
