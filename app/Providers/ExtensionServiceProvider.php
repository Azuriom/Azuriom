<?php

namespace Azuriom\Providers;

use Azuriom\Extensions\ExtensionsManager;
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

                    if (method_exists($provider, 'bindName')){
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
     * @return void
     */
    public function boot()
    {
        $theme = setting('theme');

        if ($theme !== null) {
            $path = theme_path($theme);

            $this->app['view']->getFinder()->prependLocation($path);

            config([
                'view.paths' => array_merge([$path], config('view.paths', []))
            ]);
        }
    }
}
