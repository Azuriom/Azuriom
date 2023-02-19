<?php

namespace Azuriom\Extensions\Plugin;

use Azuriom\Azuriom;
use Azuriom\Extensions\ExtensionManager;
use Azuriom\Extensions\UpdateManager;
use Azuriom\Support\Files;
use Azuriom\Support\Optimizer;
use Closure;
use Composer\Autoload\ClassLoader;
use Composer\Semver\Semver;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use RuntimeException;
use Throwable;

class PluginManager extends ExtensionManager
{
    /**
     * The enabled plugins.
     */
    protected array $plugins = [];

    /**
     * The plugins/ directory.
     */
    protected string $pluginsPath;

    /**
     * The plugins/ public directory for assets.
     *
     * @var string
     */
    protected string $pluginsPublicPath;

    /**
     * The plugins route descriptions.
     */
    protected Collection $routeDescriptions;

    /**
     * The admin panel navigation.
     */
    protected Collection $adminNavItems;

    /**
     * The user navigation.
     */
    protected Collection $userNavItems;

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

        // The plugin folder must be the plugin id
        if ($plugin !== $json->id) {
            return null;
        }

        $composerPath = $this->path($plugin, 'composer.json');
        $json->composer = $this->getJson($composerPath, true);

        return $json;
    }

    /**
     * Get an array containing the installed plugins names.
     *
     * @return string[]
     */
    public function findPlugins()
    {
        $paths = $this->files->directories($this->pluginsPath);

        return array_map(fn ($dir) => $this->files->basename($dir), $paths);
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

        Cache::forget('updates_counts');
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
        if (! $this->setPluginEnabled($plugin, true)) {
            return false;
        }

        $this->runMigrations($plugin);

        $this->createAssetsLink($plugin);

        return true;
    }

    public function disable(string $plugin)
    {
        $result = $this->setPluginEnabled($plugin, false);

        foreach (array_keys($this->plugins) as $dependency) {
            if (! $this->hasRequirements($dependency)) {
                $this->disable($dependency);
            }
        }

        return $result;
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

        if (($description->azuriom_api ?? null) !== '1.0.0') {
            return 'api';
        }

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

    public function addRouteDescription(Closure|array $items)
    {
        $this->routeDescriptions->add($items);
    }

    public function addAdminNavItem(Closure|array $items)
    {
        $this->adminNavItems->add($items);
    }

    public function addUserNavItem(Closure|array $items)
    {
        $this->userNavItems->add($items);
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getRouteDescriptions()
    {
        return $this->routeDescriptions->flatMap(fn ($value) => value($value));
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getAdminNavItems()
    {
        return $this->adminNavItems->flatMap(fn ($value) => value($value));
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getUserNavItems()
    {
        return $this->userNavItems->flatMap(fn ($value) => value($value));
    }

    public function cachePlugins(array $enabledPlugins = null)
    {
        if ($enabledPlugins === null) {
            $pluginsJsonPath = $this->pluginsPath('plugins.json');
            $enabledPlugins = $this->getJson($pluginsJsonPath, true) ?? [];
        }

        $plugins = $this->findPluginsDescriptions()
            ->filter(fn ($desc, $plugin) => in_array($plugin, $enabledPlugins, true));

        $this->plugins = $plugins->all();

        if ($plugins->isEmpty() && app()->runningInConsole()) {
            return $plugins;
        }

        $pluginsCache = $plugins->map(fn ($plugin) => (array) $plugin)->all();

        if (is_installed()) {
            $this->files->put($this->getCachedPluginsPath(), '<?php return '.var_export($pluginsCache, true).';');

            app(Optimizer::class)->removeFileFromOPCache($this->getCachedPluginsPath());
        }

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
            ->filter(fn ($plugin) => isset($plugin->apiId));

        return collect($plugins)
            ->filter(function ($plugin) use ($installedPlugins) {
                return ! $installedPlugins->contains('apiId', $plugin['id']);
            })->filter(function ($plugin) {
                $games = Arr::get($plugin, 'games', '*');

                return $games === '*' || game()->isExtensionCompatible($games);
            });
    }

    public function getPluginsToUpdate(bool $force = false)
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

    public function install($pluginId, string $version = null)
    {
        $updateManager = app(UpdateManager::class);

        $plugins = $updateManager->getPlugins(true);

        if (! array_key_exists($pluginId, $plugins)) {
            throw new RuntimeException('Cannot find plugin with id '.$pluginId);
        }

        $pluginInfo = $plugins[$pluginId];
        $plugin = $pluginInfo['extension_id'];
        $pluginDir = $this->path($plugin);

        if ($version !== null) {
            $baseUrl = Str::beforeLast($pluginInfo['url'], '/updates/');
            $pluginInfo['url'] = $baseUrl.'/download/'.$version;
        }

        if (! $this->files->isDirectory($pluginDir)) {
            $this->files->makeDirectory($pluginDir);
        }

        $updateManager->download($pluginInfo, 'plugins/', $version === null);
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

            $this->plugins = array_map(fn ($array) => (object) $array, $plugins);

            return $this->plugins;
        } catch (FileNotFoundException) {
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
        try {
            app('migrator')->run([$this->path($plugin, 'database/migrations')]);
        } catch (Throwable $t) {
            $this->setPluginEnabled($plugin, false);

            throw $t;
        }
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
