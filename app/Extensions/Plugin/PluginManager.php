<?php

namespace Azuriom\Extensions\Plugin;

use Azuriom\Extensions\ExtensionManager;
use Azuriom\Extensions\UpdateManager;
use Azuriom\Support\Optimizer;
use Composer\Autoload\ClassLoader;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Filesystem\Filesystem;
use RuntimeException;
use Throwable;

class PluginManager extends ExtensionManager
{
    /**
     * The enabled plugins.
     *
     * @var array
     */
    protected $plugins = [];

    /**
     * The plugins/ directory.
     *
     * @var string
     */
    protected $pluginsPath;

    /**
     * The plugins/ public directory for assets.
     *
     * @var string
     */
    protected $pluginsPublicPath;

    /**
     * The plugins route descriptions.
     *
     * @var \Illuminate\Support\Collection
     */
    protected $routeDescriptions;

    /**
     * The admin panel navigation.
     *
     * @var \Illuminate\Support\Collection
     */
    protected $adminNavItems;

    /**
     * Create a new PluginManager instance.
     *
     * @param  \Illuminate\Filesystem\Filesystem  $files
     */
    public function __construct(Filesystem $files)
    {
        parent::__construct($files);

        $this->pluginsPath = base_path('plugins/');
        $this->pluginsPublicPath = public_path('assets/plugins/');
        $this->routeDescriptions = collect();
        $this->adminNavItems = collect();
    }

    public function loadPlugins(Application $app)
    {
        $plugins = $this->getPlugins();

        if (empty($plugins)) {
            return;
        }

        $composer = $this->files->getRequire(base_path('vendor/autoload.php'));

        foreach ($plugins as $pluginId => $plugin) {
            try {
                if (! isset($plugin->composer)) {
                    continue;
                }

                // TODO 1.0: remove support for legacy extensions without id
                if (! isset($plugin->id)) {
                    $plugin->id = $pluginId;
                }

                $this->autoloadPlugin($pluginId, $composer, $plugin->composer);

                foreach ($plugin->providers ?? [] as $pluginProvider) {
                    $provider = new $pluginProvider($app);

                    if (method_exists($provider, 'bindPlugin')) {
                        $provider->bindPlugin($plugin);
                    }

                    $app->register($provider);
                }
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
        return $this->pluginsPath.$path;
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
        return $this->pluginsPath("{$plugin}/{$path}");
    }

    public function publicPath(string $plugin, string $path = '')
    {
        return $this->pluginsPublicPath("{$plugin}/{$path}");
    }

    /**
     * Get the path to the cached plugins.php file.
     *
     * @return string
     */
    public function getCachedPluginsPath()
    {
        return base_path('bootstrap/cache/plugins.php');
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

            $description = $this->findDescription($name);

            if ($description) {
                $plugins[$name] = $description;
            }
        }

        return $plugins;
    }

    /**
     * Get the description of the given plugin.
     *
     * @param  string|null  $plugin
     * @return mixed|null
     */
    public function findDescription(string $plugin)
    {
        $path = $this->path($plugin, 'plugin.json');

        if ($path === null) {
            return null;
        }

        $json = $this->getJson($path);

        if ($json === null) {
            return null;
        }

        // TODO 1.0: remove support for legacy extensions without id
        if (! isset($json->id)) {
            $json->id = $plugin;
        }

        // The plugin folder must be the plugin id
        if ($plugin !== $json->id) {
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

        $this->files->deleteDirectory($this->publicPath($plugin));

        $this->files->deleteDirectory($this->path($plugin));
    }

    /**
     * Get the enabled plugins.
     *
     * @return array
     */
    public function plugins()
    {
        return $this->plugins;
    }

    /**
     * Return if a plugin is enabled.
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

        $this->createAssetsLink($plugin);
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

        if (empty($enabledPlugins)) {
            $this->files->delete($this->getCachedPluginsPath());

            return [];
        }

        $pluginsCache = array_map(function ($plugin) {
            return (array) $plugin;
        }, $plugins);

        $this->files->put($this->getCachedPluginsPath(), '<?php return '.var_export($pluginsCache, true).';');

        app(Optimizer::class)->removeFileFromOPCache($this->getCachedPluginsPath());

        return $plugins;
    }

    public function refreshRoutesCache()
    {
        app(Optimizer::class)->reloadRoutesCache();
    }

    public function getOnlinePlugins(bool $force = false)
    {
        $plugins = app(UpdateManager::class)->getPlugins($force);

        $installedPlugins = collect($this->findPluginsDescriptions())
            ->filter(function ($plugin) {
                return isset($plugin->apiId);
            })
            ->pluck('apiId')
            ->all();

        return array_filter($plugins, function ($plugin) use ($installedPlugins) {
            return ! in_array($plugin['id'], $installedPlugins);
        });
    }

    public function getPluginToUpdate(bool $force = false)
    {
        $plugins = app(UpdateManager::class)->getPlugins($force);

        return array_filter($this->findPluginsDescriptions(), function ($plugin) use ($plugins) {
            $id = $plugin->apiId ?? 0;

            if (! array_key_exists($id, $plugins)) {
                return false;
            }

            return version_compare($plugins[$id]['version'], $plugin->version, '>');
        });
    }

    public function install($pluginId)
    {
        $updateManager = app(UpdateManager::class);

        $plugins = $updateManager->getPlugins(true);

        if (! array_key_exists($pluginId, $plugins)) {
            throw new RuntimeException('Cannot find plugin with id '.$pluginId);
        }

        $pluginInfo = $plugins[$pluginId];

        $plugin = $pluginInfo['extension_id'];

        $pluginDir = $this->path($plugin);

        if (! $this->files->isDirectory($pluginDir)) {
            $this->files->makeDirectory($pluginDir);
        }

        $updateManager->download($pluginInfo, 'plugins/');

        $updateManager->extract($pluginInfo, $pluginDir, 'plugins/');

        $this->createAssetsLink($plugin);
    }

    protected function getPlugins()
    {
        try {
            $plugins = $this->files->getRequire($this->getCachedPluginsPath());

            $this->plugins = array_map(function ($array) {
                return (object) $array;
            }, $plugins);

            return $this->plugins;
        } catch (FileNotFoundException $e) {
            $this->plugins = $this->cachePlugins();

            return $this->plugins;
        }
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
            $this->files->link($pluginAssetsPath, $this->pluginsPublicPath($plugin));
        }
    }
}
