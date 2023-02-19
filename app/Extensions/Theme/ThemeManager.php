<?php

namespace Azuriom\Extensions\Theme;

use Azuriom\Extensions\ExtensionManager;
use Azuriom\Extensions\UpdateManager;
use Azuriom\Models\Setting;
use Azuriom\Support\Files;
use Azuriom\Support\Optimizer;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Cache;
use RuntimeException;

class ThemeManager extends ExtensionManager
{
    /**
     * The current theme if set.
     */
    protected ?string $currentTheme = null;

    /**
     * The themes directory.
     */
    protected string $themesPath;

    /**
     * The themes public directory for assets.
     */
    protected string $themesPublicPath;

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
     * Currently, this method can only be call once.
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
            'view.paths' => [$viewsPath, ...config('view.paths', [])],
        ]);

        $this->loadConfig($theme);
    }

    public function changeTheme(?string $theme)
    {
        Setting::updateSettings('theme', $theme);

        if ($theme) {
            $this->createAssetsLink($theme);
        }
    }

    public function updateConfig(string $theme, array $config)
    {
        $json = json_encode($config, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);

        $this->files->put($this->path('config.json', $theme), $json);

        Setting::updateSettings('themes.config.'.$theme, $config);
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
     * @return \Illuminate\Support\Collection
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

        return collect($themes);
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

        $json = $this->getJson($path);

        if ($json === null) {
            return null;
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
        $paths = $this->files->directories($this->themesPath);

        return array_map(fn ($dir) => $this->files->basename($dir), $paths);
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

        Setting::updateSettings('themes.config.'.$theme, null);

        $this->files->deleteDirectory($this->publicPath('', $theme));

        $this->files->deleteDirectory($this->path('', $theme));

        Cache::forget('updates_counts');
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

        $installedThemes = $this->findThemesDescriptions()
            ->filter(fn ($theme) => isset($theme->apiId));

        return collect($themes)->filter(function ($theme) use ($installedThemes) {
            return ! $installedThemes->contains('apiId', $theme['id']);
        });
    }

    public function getThemesToUpdate(bool $force = false)
    {
        $themes = app(UpdateManager::class)->getThemes($force);

        return $this->findThemesDescriptions()->filter(function ($theme) use ($themes) {
            $id = $theme->apiId ?? 0;

            if (! array_key_exists($id, $themes)) {
                return false;
            }

            return version_compare($themes[$id]['version'], $theme->version, '>');
        });
    }

    public function isLegacy(string $theme)
    {
        $description = $this->findDescription($theme);

        return ($description->azuriom_api ?? null) !== '1.0.0';
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

        app(Optimizer::class)->clearViewCache();

        $this->createAssetsLink($theme);
    }

    public function readConfig(string $theme)
    {
        return $this->getJson($this->path('config.json', $theme), true);
    }

    protected function loadConfig(string $theme)
    {
        $config = setting('themes.config.'.$theme);

        if ($config === null) {
            $config = $this->readConfig($theme);

            Setting::updateSettings('themes.config.'.$theme, $config);
        }

        if ($config !== null) {
            foreach ($config as $key => $value) {
                config()->set('theme.'.$key, $value);
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
            Files::relativeLink($themeAssetsPath, $this->themesPublicPath($theme));
        }
    }
}
