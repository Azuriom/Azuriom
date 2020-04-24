<?php

namespace Azuriom\Extensions\Theme;

use Azuriom\Extensions\ExtensionManager;
use Azuriom\Extensions\UpdateManager;
use Azuriom\Models\Setting;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Cache;
use RuntimeException;

class ThemeManager extends ExtensionManager
{
    /**
     * The current theme if set.
     *
     * @var string|null
     */
    protected $currentTheme;

    /**
     * The themes/ directory.
     *
     * @var string
     */
    protected $themesPath;

    /**
     * The themes/ public directory for assets.
     *
     * @var string
     */
    protected $themesPublicPath;

    /**
     * Create a new ThemeManager instance.
     *
     * @param  \Illuminate\Filesystem\Filesystem  $files
     */
    public function __construct(Filesystem $files)
    {
        parent::__construct($files);

        $this->themesPath = resource_path('themes/');
        $this->themesPublicPath = public_path('assets/themes/');
    }

    /**
     * Load and enable the given theme.
     * Currently this method can only be call once.
     *
     * @param  string  $theme
     */
    public function loadTheme(string $theme)
    {
        if ($this->currentTheme !== null) {
            throw new RuntimeException('A theme has been already loaded');
        }

        $this->currentTheme = $theme;

        $viewsPath = $this->path('views');

        // Add theme path to view finder
        view()->getFinder()->prependLocation($viewsPath);

        config([
            'view.paths' => array_merge([$viewsPath], config('view.paths', [])),
        ]);

        $this->loadConfig($theme);
    }

    public function changeTheme($theme)
    {
        Setting::updateSettings('theme', $theme);

        Cache::forget('theme.config');

        if ($theme) {
            $this->createAssetsLink($theme);
        }
    }

    public function updateConfig(string $theme, array $config)
    {
        $json = json_encode($config, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);

        $this->files->put($this->path('config.json', $theme), $json);

        Cache::put('theme.config', $config, now()->addDay());
    }

    /**
     * Get the path of the specified theme.
     * If no theme is specified the current theme is used.
     * When no theme is specified and there is no theme enabled, this
     * will return null.
     *
     * @param  string  $path
     * @param  string|null  $theme
     * @return string|null
     */
    public function path(string $path = '', string $theme = null)
    {
        if ($theme === null) {
            if (! $this->hasTheme()) {
                return null;
            }

            $theme = $this->currentTheme;
        }

        return $this->themesPath("{$theme}/{$path}");
    }

    /**
     * Get the public path of the specified theme.
     *
     * @param  string  $path
     * @param  string|null  $theme
     * @return string|null
     */
    public function publicPath(string $path = '', string $theme = null)
    {
        if ($theme === null) {
            if (! $this->hasTheme()) {
                return null;
            }

            $theme = $this->currentTheme;
        }

        return $this->themesPublicPath("{$theme}/{$path}");
    }

    /**
     * Get the themes path which contains the installed themes.
     *
     * @param  string  $path
     * @return string
     */
    public function themesPath(string $path = '')
    {
        return $this->themesPath.$path;
    }

    /**
     * Get the themes public path which contains the assets of the installed themes.
     *
     * @param  string  $path
     * @return string
     */
    public function themesPublicPath(string $path = '')
    {
        return $this->themesPublicPath.$path;
    }

    /**
     * Get an array containing the descriptions of the installed themes.
     *
     * @return array
     */
    public function findThemesDescriptions()
    {
        $directories = $this->files->directories($this->themesPath);

        $themes = [];

        foreach ($directories as $dir) {
            $description = $this->getJson($dir.'/theme.json');

            if ($description) {
                $themes[$this->files->basename($dir)] = $description;
            }
        }

        return $themes;
    }

    /**
     * Get the description of the given theme.
     *
     * @param  string|null  $theme
     * @return mixed|null
     */
    public function findDescription(string $theme)
    {
        $path = $this->path('theme.json', $theme);

        if ($path === null) {
            return null;
        }

        $json = $this->getJson($path);

        // TODO 1.0: remove support for legacy extensions without id
        if (! isset($json->id)) {
            $json->id = $theme;
        }

        // The theme folder must be the theme id
        return $theme === $json->id ? $json : null;
    }

    /**
     * Get an array containing the installed themes names.
     *
     * @return string[]
     */
    public function findThemes()
    {
        $directories = $this->files->directories($this->themesPath);

        return array_map(function ($dir) {
            return $this->files->basename($dir);
        }, $directories);
    }

    /**
     * Delete the given theme.
     *
     * @param  string  $theme
     */
    public function delete(string $theme)
    {
        if ($this->findDescription($theme) === null) {
            return;
        }

        $this->files->deleteDirectory($this->publicPath('', $theme));

        $this->files->deleteDirectory($this->path('', $theme));
    }

    /**
     * Get the current theme, or null if none is active.
     *
     * @return string|null
     */
    public function currentTheme()
    {
        return $this->currentTheme;
    }

    /**
     * Get if there is any active theme enabled.
     *
     * @return bool
     */
    public function hasTheme()
    {
        return $this->currentTheme !== null;
    }

    public function getOnlineThemes(bool $force = false)
    {
        $themes = app(UpdateManager::class)->getThemes($force);

        $installedThemes = collect($this->findThemesDescriptions())
            ->filter(function ($theme) {
                return isset($theme->apiId);
            })
            ->pluck('apiId')
            ->all();

        return array_filter($themes, function ($theme) use ($installedThemes) {
            return ! in_array($theme['id'], $installedThemes, true);
        });
    }

    public function getThemesToUpdate(bool $force = false)
    {
        $themes = app(UpdateManager::class)->getThemes($force);

        return array_filter($this->findThemesDescriptions(), function ($theme) use ($themes) {
            $id = $theme->apiId ?? 0;

            if (! array_key_exists($id, $themes)) {
                return false;
            }

            return version_compare($themes[$id]['version'], $theme->version, '>');
        });
    }

    public function install($themeId)
    {
        $updateManager = app(UpdateManager::class);

        $themes = $updateManager->getThemes(true);

        if (! array_key_exists($themeId, $themes)) {
            throw new RuntimeException('Cannot find theme with id '.$themeId);
        }

        $themeInfo = $themes[$themeId];

        $theme = $themeInfo['extension_id'];

        $themeDir = $this->path('', $theme);

        if (! $this->files->isDirectory($themeDir)) {
            $this->files->makeDirectory($themeDir);
        }

        $updateManager->download($themeInfo, 'themes/');
        $updateManager->extract($themeInfo, $themeDir, 'themes/');

        $this->createAssetsLink($theme);
    }

    public function readConfig(string $theme)
    {
        return $this->getJson($this->path('config.json', $theme), true);
    }

    protected function loadConfig(string $theme)
    {
        $themeConfig = Cache::remember('theme.config', now()->addDay(), function () use ($theme) {
            return $this->readConfig($theme);
        });

        if ($themeConfig !== null) {
            foreach ($themeConfig as $key => $value) {
                config(['theme.'.$key => $value]);
            }
        }
    }

    protected function createAssetsLink(string $theme)
    {
        if ($this->files->exists($this->publicPath('', $theme))) {
            return;
        }

        $themeAssetsPath = $this->path('assets', $theme);

        if ($this->files->exists($themeAssetsPath)) {
            $this->files->link($themeAssetsPath, $this->themesPublicPath($theme));
        }
    }
}
