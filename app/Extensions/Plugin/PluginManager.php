<?php

namespace Azuriom\Extensions\Plugin;

use Azuriom\Extensions\ExtensionManager;
use Composer\Autoload\ClassLoader;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Collection;
use Throwable;

class PluginManager extends ExtensionManager
{
    /**
     * The enabled plugins.
     *
     * @var array
     */
    private $plugins = [];

    /**
     * The plugins/ directory.
     *
     * @var string
     */
    private $pluginsPath;

    /**
     * The plugins/ public directory for assets.
     *
     * @var string
     */
    private $pluginsPublicPath;

    /**
     * The plugins route descriptions.
     *
     * @var \Illuminate\Support\Collection
     */
    private $routeDescriptions;

    /**
     * The admin panel navigation.
     *
     * @var \Illuminate\Support\Collection
     */
    private $adminNavItems;

    /**
     * Create a new pluginManager instance.
     *
     * @param  \Illuminate\Filesystem\Filesystem  $files
     */
    public function __construct(Filesystem $files)
    {
        parent::__construct($files);

        $this->pluginsPath = base_path('plugins');
        $this->pluginsPublicPath = public_path('assets/plugins');
        $this->routeDescriptions = new Collection();
        $this->adminNavItems = new Collection();
    }

    public function loadPlugins(Application $app)
    {
        $plugins = $this->getPlugins();

        if (empty($plugins)) {
            return;
        }

        $composer = $this->files->getRequire(base_path('vendor/autoload.php'));

        foreach ($plugins as $name => $plugin) {
            try {
                $this->autoloadPlugin($name, $composer, $plugin->composer);

                foreach ($plugin->providers ?? [] as $pluginProvider) {
                    $provider = new $pluginProvider($app);

                    if (method_exists($provider, 'bindName')) {
                        $provider->bindName($name);
                    }

                    $app->register($provider);
                }

                $this->createAssetsLink($name);
            } catch (Throwable $t) {
                report($t);
            }
        }
    }

    /**
     * Get the plugins path which contains the installed plugins.
     *
     * @param  string  $path
     * @return string
     */
    public function pluginsPath(string $path = '')
    {
        return $this->pluginsPath.'/'.$path;
    }

    /**
     * Get the plugins public path which contains the assets of the installed plugins.
     *
     * @param  string  $path
     * @return string
     */
    public function pluginsPublicPath(string $path = '')
    {
        return $this->pluginsPublicPath.$path;
    }

    /**
     * Get the path of the specified plugin.
     *
     * @param  string  $path
     * @param  string|null  $plugin
     * @return string|null
     */
    public function path(string $plugin, string $path = '')
    {
        return $this->pluginsPath("/{$plugin}/{$path}");
    }

    public function publicPath(string $plugin, string $path = '')
    {
        return $this->pluginsPublicPath("/{$plugin}/{$path}");
    }

    /**
     * Get the path to the cached plugins.php file.
     *
     * @return string
     */
    public function getCachedPluginsPath()
    {
        return storage_path('app/plugins');
    }

    /**
     * Get an array containing the descriptions of the installed plugins.
     *
     * @return array
     */
    public function findPluginsDescriptions()
    {
        $directories = $this->files->directories($this->pluginsPath);

        $plugins = [];

        foreach ($directories as $dir) {
            $name = $this->files->basename($dir);

            $plugins[$name] = $this->findDescription($name);
        }

        return $plugins;
    }

    /**
     * Get the description of the given plugin.
     *
     * @param  string|null  $plugin
     * @return mixed|null
     */
    public function findDescription(string $plugin = null)
    {
        $path = $this->path($plugin, 'plugin.json');

        if ($path === null) {
            return null;
        }

        $json = $this->getJson($path);

        if ($json === null) {
            return null;
        }

        $json->composer = $this->getJson($this->path($plugin, 'composer.json'), true);

        return $json;
    }

    /**
     * Get an array containing the installed plugins names.
     *
     * @return string[]
     */
    public function findPlugins()
    {
        $directories = $this->files->directories($this->pluginsPath);

        return array_map(function ($dir) {
            return $this->files->basename($dir);
        }, $directories);
    }

    /**
     * Delete the given plugin.
     *
     * @param  string  $plugin
     */
    public function delete(string $plugin)
    {
        if ($this->findDescription($plugin) === null) {
            return;
        }

        $this->files->delete($this->pluginsPublicPath($plugin));

        $this->files->delete($this->path($plugin));
    }

    /**
     * Get the enabled plugins
     *
     * @return array
     */
    public function plugins()
    {
        return $this->plugins;
    }

    /**
     * Return if a plugin is enabled
     *
     * @param  string  $plugin
     * @return bool
     */
    public function isEnabled(string $plugin)
    {
        return array_key_exists($plugin, $this->plugins);
    }

    public function enable(string $plugin)
    {
        $this->setPluginEnabled($plugin, true);

        app('migrator')->run([$this->path($plugin, 'database/migrations')]);
    }

    public function disable(string $plugin)
    {
        $this->setPluginEnabled($plugin, false);
    }

    public function addRouteDescription(array $items)
    {
        foreach ($items as $key => $value) {
            $this->routeDescriptions->put($key, $value);
        }
    }

    public function addAdminNavItem(array $items)
    {
        foreach ($items as $key => $value) {
            $this->adminNavItems->put($key, $value);
        }
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getRouteDescriptions()
    {
        return $this->routeDescriptions;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getAdminNavItems()
    {
        return $this->adminNavItems;
    }

    public function cachePlugins(array $enabledPlugins = null)
    {
        if ($enabledPlugins === null) {
            $enabledPlugins = $this->getJson($this->pluginsPath('plugins.json'), true) ?? [];
        }

        $plugins = array_filter($this->findPluginsDescriptions(), function ($plugin) use ($enabledPlugins) {
            return in_array($plugin, $enabledPlugins, true);
        }, ARRAY_FILTER_USE_KEY);

        $plugins = array_map(function ($plugin) {
            return (array) $plugin;
        }, $plugins);

        if (empty($enabledPlugins)) {
            $this->files->delete($this->getCachedPluginsPath());
            return [];
        }

        $this->files->put($this->getCachedPluginsPath(), serialize($plugins));

        return $plugins;
    }

    protected function getPlugins()
    {
        if ($this->files->isFile($this->getCachedPluginsPath())) {
            try {
                $this->plugins = array_map(function ($array) {
                    return (object) $array;
                }, unserialize($this->files->get($this->getCachedPluginsPath())));

                return $this->plugins;
            } catch (FileNotFoundException $e) {
                //
            }
        }

        $this->plugins = $this->cachePlugins();

        return $this->plugins;
    }

    protected function setPluginEnabled(string $plugin, bool $enabled)
    {
        $description = $this->findDescription($plugin);

        if ($description === null) {
            return false;
        }

        $plugins = array_keys($this->plugins);

        if ($enabled) {
            $plugins[] = $plugin;
        } else {
            foreach (array_keys($plugins, $plugin, true) as $key) {
                unset($plugins[$key]);
            }
        }

        $this->files->put($this->pluginsPath('plugins.json'), json_encode($plugins));

        $this->cachePlugins($plugins);

        return true;
    }

    protected function autoloadPlugin(string $plugin, ClassLoader $composer, array $composerJson)
    {
        $autoload = $composerJson['autoload'] ?? [];

        foreach ($autoload['psr-4'] ?? [] as $namespace => $path) {
            if (! array_key_exists($namespace, $composer->getClassMap())) {
                $composer->addPsr4($namespace, $this->path($plugin, $path));
            }
        }

        foreach ($autoload['files'] ?? [] as $file) {
            $this->files->getRequire($this->path($plugin, $file));
        }
    }

    protected function createAssetsLink(string $plugin)
    {
        if ($this->files->exists($this->publicPath('', $plugin))) {
            return;
        }

        $pluginAssetsPath = $this->path($plugin, 'assets');

        if ($this->files->exists($pluginAssetsPath)) {
            $this->files->link($pluginAssetsPath, $this->pluginsPublicPath("/{$plugin}"));
        }
    }
}
