<?php

namespace Azuriom\Providers;

use Azuriom\Extensions\ExtensionsManager;
use Illuminate\Cache\Repository as Cache;
use Illuminate\Config\Repository as Config;
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
        $extensions = $this->app->make(ExtensionsManager::class);

        $this->app->instance('extensions', $extensions);

        foreach ($extensions->loadPlugins() as $path => $plugin) {
            foreach ($plugin->providers ?? [] as $pluginProvider) {
                if (class_exists($pluginProvider)) {
                    $provider = new $pluginProvider($this->app);

                    if (method_exists($provider, 'bindName')) {
                        $provider->bindName($path);
                    }

                    $this->app->register($provider);
                }
            }
        }
    }

    /**
     * Bootstrap services.
     *
     * @param  \Azuriom\Extensions\ExtensionsManager  $extensionsManager
     * @param  \Illuminate\Cache\Repository  $cache
     * @param  \Illuminate\Config\Repository  $config
     * @return void
     */
    public function boot(ExtensionsManager $extensionsManager, Cache $cache, Config $config)
    {
        $theme = setting('theme');

        if ($theme === null) {
            return;
        }
        $path = theme_path($theme);

        // Add theme path to view finder
        $this->app['view']->getFinder()->prependLocation($path);

        $config->set([
            'view.paths' => array_merge([$path], $config->get('view.paths', []))
        ]);

        // Load theme config
        $themeConfig = $cache->remember('theme.config', now()->addDay(),
            function () use ($extensionsManager, $theme) {
                return $extensionsManager->getThemeConfig($theme);
            });

        if ($themeConfig !== null) {
            foreach ($themeConfig as $key => $value) {
                $config->set('theme.'.$key, $value);
            }
        }

        if (is_dir($path.'/lang')) {
            $this->loadTranslationsFrom($path.'/lang', 'theme.'.$theme);
        }
    }
}
