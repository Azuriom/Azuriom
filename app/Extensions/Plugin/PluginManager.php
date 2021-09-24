<?php

namespace Azuriom\Extensions\Plugin;

use Azuriom\Azuriom;
use Azuriom\Extensions\ExtensionManager;
use Azuriom\Extensions\UpdateManager;
use Azuriom\Support\Files;
use Azuriom\Support\Optimizer;
use Composer\Autoload\ClassLoader;
use Composer\Semver\Semver;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
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
     * The user navigation.
     *
     * @var \Illuminate\Support\Collection
     */
    protected $userNavItems;

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
        $this->userNavItems = collect();
    }

    public function loadPlugins(Application $app, bool $gamesOnly = false)
    {
        $plugins = $this->getPlugins();

        if (empty($plugins)) {
            return;
        }

        $composer = $this->files->getRequire(base_path('vendor/autoload.php'));

        foreach ($plugins as $pluginId => $plugin) {
            try {
                if (! isset($plugin->composer) || ($gamesOnly && ! isset($plugin->installRedirectPath))) {
                    continue;
                }

                // TODO 1.0: remove support for legacy extensions without id
                if (! isset($plugin->id)) {
                    $plugin->id = $pluginId;
                }

                $this->autoloadPlugin($pluginId, $composer, $plugin->composer);

                $providers = array_map(function ($provider) use ($app) {
                    return new $provider($app);
                }, $plugin->providers ?? []);

                foreach ($providers as $provider) {
                    if (method_exists($provider, 'bindPlugin')) {
                        $provider->bindPlugin($plugin);
                    }

                    $app->register($provider);
                }
            } catch (Throwable $t) {
                if (! $app->isProduction()) {
                    throw $t;
                }

                report($t);

                $this->disable($pluginId);
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
     * @param  string  $plugin
     * @return string
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
     * @return \Illuminate\Support\Collection
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

        return collect($plugins);
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

        $this->runMigrations($plugin);

        $this->createAssetsLink($plugin);
    }

    public function disable(string $plugin)
    {
        $this->setPluginEnabled($plugin, false);
    }

    public function hasRequirements(string $plugin)
    {
        return $this->getMissingRequirements($plugin) === null;
    }

    public function isSupportedByGame(string $plugin)
    {
        $description = $this->findDescription($plugin);
        $supportedGames = $description->games ?? null;

        if (! is_array($supportedGames)) {
            return true;
        }

        return game()->isExtensionCompatible($supportedGames);
    }

    public function getMissingRequirements(string $plugin)
    {
        $description = $this->findDescription($plugin);

        if (! isset($description->dependencies)) {
            return null;
        }

        foreach ($description->dependencies as $dependency => $minVersion) {
            $optional = Str::endsWith($dependency, '?');

            if ($optional) {
                $dependency = Str::substr($dependency, 0, -1);
            }

            if ($dependency === 'azuriom') {
                $version = Azuriom::version();
            } elseif ($this->isEnabled($dependency)) {
                $version = $this->plugins[$dependency]->version;
            } elseif ($optional) {
                continue; // Dependency is missing but is optional
            } else {
                return $dependency;
            }

            if (! Semver::satisfies($version, $minVersion)) {
                return $dependency;
            }
        }

        return null;
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

    public function addUserNavItem(array $items)
    {
        foreach ($items as $key => $value) {
            $this->userNavItems->put($key, $value);
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

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getUserNavItems()
    {
        return $this->userNavItems;
    }

    public function cachePlugins(array $enabledPlugins = null)
    {
        if ($enabledPlugins === null) {
            $enabledPlugins = $this->getJson($this->pluginsPath('plugins.json'), true) ?? [];
        }

        $plugins = $this->findPluginsDescriptions()->filter(function ($desc, $plugin) use ($enabledPlugins) {
            return in_array($plugin, $enabledPlugins, true);
        });

        if ($plugins->isEmpty() && app()->runningInConsole()) {
            return $plugins;
        }

        $pluginsCache = $plugins->map(function ($plugin) {
            return (array) $plugin;
        })->all();

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

        $installedPlugins = $this->findPluginsDescriptions()
            ->filter(function ($plugin) {
                return isset($plugin->apiId);
            });

        return collect($plugins)
            ->filter(function ($plugin) use ($installedPlugins) {
                return ! $installedPlugins->contains('apiId', $plugin['id']);
            })->filter(function ($plugin) {
                $games = Arr::get($plugin, 'games', '*');

                return $games === '*' || game()->isExtensionCompatible($games);
            });
    }

    public function getPluginToUpdate(bool $force = false)
    {
        $plugins = app(UpdateManager::class)->getPlugins($force);

        return $this->findPluginsDescriptions()->filter(function ($plugin) use ($plugins) {
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

        if (! $this->hasRequirements($plugin)) {
            $this->disable($plugin);

            return;
        }

        // Run the migrations if the plugin was updated
        if ($this->isEnabled($plugin)) {
            $this->runMigrations($plugin);
        }
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
            $this->plugins = $this->cachePlugins()->all();

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

            $plugins = array_values($plugins);
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

    protected function runMigrations(string $plugin)
    {
        app('migrator')->run([$this->path($plugin, 'database/migrations')]);
    }

    protected function createAssetsLink(string $plugin)
    {
        if ($this->files->exists($this->publicPath('', $plugin))) {
            return;
        }

        $pluginAssetsPath = $this->path($plugin, 'assets');

        if ($this->files->exists($pluginAssetsPath)) {
            Files::relativeLink($pluginAssetsPath, $this->pluginsPublicPath($plugin));
        }
    }
}
