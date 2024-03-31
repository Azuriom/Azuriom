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
use Illuminate\Support\Facades\Gate;
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

    /**
     * Load all the plugins, or only the games if specified.
     *
     * @throws \Throwable
     */
    public function loadPlugins(Application $app, bool $gamesOnly = false): void
    {
        $plugins = $this->getPlugins($gamesOnly);

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
     */
    public function pluginsPath(string $path = ''): string
    {
        return $this->pluginsPath.$path;
    }

    /**
     * Get the plugins public path which contains the assets of the installed plugins.
     */
    public function pluginsPublicPath(string $path = ''): string
    {
        return $this->pluginsPublicPath.$path;
    }

    /**
     * Get the path of the specified plugin.
     */
    public function path(string $plugin, string $path = ''): string
    {
        return $this->pluginsPath($plugin.'/'.$path);
    }

    /**
     * Get the public path of the specified plugin.
     */
    public function publicPath(string $plugin, string $path = ''): string
    {
        return $this->pluginsPublicPath($plugin.'/'.$path);
    }

    /**
     * Get the path to the cached plugins.php file.
     */
    public function getCachedPluginsPath(): string
    {
        return base_path('bootstrap/cache/plugins.php');
    }

    /**
     * Get an array containing the descriptions of the installed plugins.
     */
    public function findPluginsDescriptions(): Collection
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
     */
    public function findDescription(string $plugin): ?object
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
    public function findPlugins(): array
    {
        $paths = $this->files->directories($this->pluginsPath);

        return array_map(fn ($dir) => $this->files->basename($dir), $paths);
    }

    /**
     * Delete the given plugin.
     */
    public function delete(string $plugin): void
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
     */
    public function plugins(): array
    {
        return $this->plugins;
    }

    /**
     * Return if a plugin is enabled.
     */
    public function isEnabled(string $plugin): bool
    {
        return array_key_exists($plugin, $this->plugins);
    }

    /**
     * Enable the given plugin.
     *
     * @throws \Throwable
     */
    public function enable(string $plugin): bool
    {
        if (! $this->setPluginEnabled($plugin, true)) {
            return false;
        }

        $this->runMigrations($plugin);

        $this->createAssetsLink($plugin);

        return true;
    }

    public function disable(string $plugin): bool
    {
        $result = $this->setPluginEnabled($plugin, false);

        foreach (array_keys($this->plugins) as $dependency) {
            if (! $this->hasRequirements($dependency)) {
                $this->disable($dependency);
            }
        }

        return $result;
    }

    public function hasRequirements(string $plugin): bool
    {
        return $this->getMissingRequirements($plugin) === null;
    }

    public function isSupportedByGame(string $plugin): bool
    {
        $description = $this->findDescription($plugin);
        $supportedGames = $description->games ?? null;

        if (! is_array($supportedGames)) {
            return true;
        }

        return game()->isExtensionCompatible($supportedGames);
    }

    public function getMissingRequirements(string $plugin): ?string
    {
        $description = $this->findDescription($plugin);

        if (! ExtensionManager::isApiSupported($description->azuriom_api ?? null)) {
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

    public function addRouteDescription(Closure|array $items): void
    {
        $this->routeDescriptions->add($items);
    }

    public function addAdminNavItem(Closure|array $items): void
    {
        $this->adminNavItems->add($items);
    }

    public function addUserNavItem(Closure|array $items): void
    {
        $this->userNavItems->add($items);
    }

    public function getRouteDescriptions(): Collection
    {
        return $this->routeDescriptions->flatMap(fn ($value) => value($value));
    }

    public function getAdminNavItems(): Collection
    {
        return $this->adminNavItems->flatMap(fn ($value) => value($value));
    }

    public function getUserNavItems(): Collection
    {
        return $this->userNavItems->flatMap(fn ($value) => value($value))
            ->filter(fn ($item) => ! isset($item['permission']) || Gate::allows($item['permission']));
    }

    public function cachePlugins(array $enabledPlugins = null): Collection
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

    public function refreshRoutesCache(): void
    {
        app(Optimizer::class)->reloadRoutesCache();
    }

    public function getOnlinePlugins(bool $force = false): Collection
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

    public function getPluginsToUpdate(bool $force = false): Collection
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

    public function install($pluginId, string $version = null): void
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

    protected function getPlugins(bool $ignoreCache): array
    {
        if ($ignoreCache) {
            $this->plugins = $this->cachePlugins()->all();

            return $this->plugins;
        }

        try {
            $plugins = $this->files->getRequire($this->getCachedPluginsPath());

            $this->plugins = array_map(fn ($array) => (object) $array, $plugins);
        } catch (FileNotFoundException) {
            $this->plugins = $this->cachePlugins()->all();
        }

        return $this->plugins;
    }

    protected function setPluginEnabled(string $plugin, bool $enabled): bool
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

        $res = $this->files->put($this->pluginsPath('plugins.json'), json_encode($plugins));

        if ($res === false) {
            return false;
        }

        $this->cachePlugins($plugins);

        return true;
    }

    protected function autoloadPlugin(string $plugin, ClassLoader $composer, array $composerJson): void
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

    protected function runMigrations(string $plugin): void
    {
        try {
            app('migrator')->run([$this->path($plugin, 'database/migrations')]);
        } catch (Throwable $t) {
            $this->setPluginEnabled($plugin, false);

            throw $t;
        }
    }

    protected function createAssetsLink(string $plugin): void
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
