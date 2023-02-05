<?php

namespace Azuriom\Http\Controllers\Admin;

use Azuriom\Extensions\Theme\ThemeManager;
use Azuriom\Extensions\UpdateManager;
use Azuriom\Http\Controllers\Controller;
use Azuriom\Models\ActionLog;
use Azuriom\Models\Image;
use Exception;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Http\Request;
use Throwable;

class ThemeController extends Controller
{
    /**
     * The themes manager instance.
     *
     * @var \Azuriom\Extensions\Theme\ThemeManager
     */
    private $themes;

    /**
     * The filesystem instance.
     *
     * @var \Illuminate\Filesystem\Filesystem
     */
    private $files;

    /**
     * Create a new controller instance.
     *
     * @param  \Illuminate\Filesystem\Filesystem  $files
     * @param  \Azuriom\Extensions\Theme\ThemeManager  $themes
     */
    public function __construct(Filesystem $files, ThemeManager $themes)
    {
        $this->files = $files;
        $this->themes = $themes;
    }

    /**
     * Display a listing of the extensions.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $themes = $this->themes->findThemesDescriptions();

        $current = null;

        if ($this->themes->hasTheme()) {
            $current = $themes->pull($this->themes->currentTheme());
        }

        $currentThemeConfig = $this->themes->path('config/rules.php', $this->themes->currentTheme());

        return view('admin.themes.index', [
            'themes' => $themes,
            'current' => $current,
            'currentPath' => $this->themes->currentTheme() ?? 'default',
            'currentHasConfig' => $this->files->isFile($currentThemeConfig),
            'availableThemes' => $this->themes->getOnlineThemes(),
            'themesUpdates' => $this->themes->getThemesToUpdate(),
        ]);
    }

    public function reload()
    {
        $response = redirect()->route('admin.themes.index');

        try {
            app(UpdateManager::class)->forceFetchUpdates();
        } catch (Exception $e) {
            return $response->with('error', trans('messages.status.error', [
                'error' => $e->getMessage(),
            ]));
        }

        return $response->with('success', trans('admin.themes.reloaded'));
    }

    public function update(string $theme)
    {
        $description = $this->themes->findDescription($theme);

        try {
            if ($description !== null && isset($description->apiId)) {
                $oldConfig = $this->themes->readConfig($theme);

                $this->themes->delete($theme);

                $this->themes->install($description->apiId);

                if ($oldConfig !== null) {
                    $newConfig = $this->themes->readConfig($theme) ?? [];

                    $this->themes->updateConfig($theme, array_merge($newConfig, $oldConfig));
                }
            }
        } catch (Throwable $t) {
            report($t);

            return redirect()->route('admin.themes.index')
                ->with('error', trans('messages.status.error', [
                    'error' => $t->getMessage(),
                ]));
        }

        return redirect()->route('admin.themes.index')
            ->with('success', trans('admin.themes.installed'));
    }

    public function download(string $themeId)
    {
        try {
            $this->themes->install($themeId);
        } catch (Throwable $t) {
            return redirect()->route('admin.themes.index')
                ->with('error', trans('messages.status.error', [
                    'error' => $t->getMessage(),
                ]));
        }

        return redirect()->route('admin.themes.index')
            ->with('success', trans('admin.themes.installed'));
    }

    public function delete(string $theme)
    {
        if ($this->themes->currentTheme() === $theme) {
            return redirect()->route('admin.themes.index')
                ->with('error', trans('admin.themes.delete_current'));
        }

        $this->themes->delete($theme);

        return redirect()->route('admin.themes.index')
            ->with('success', trans('admin.themes.deleted'));
    }

    public function edit(Request $request, string $theme)
    {
        if ($request->isXmlHttpRequest()) {
            return response()->json(theme_config());
        }

        $viewPath = $this->themes->path('config/config.blade.php', $theme);

        if (! $this->files->exists($viewPath)) {
            return redirect()->route('admin.themes.index')
                ->with('error', trans('admin.themes.no_config'));
        }

        return view()->file($viewPath, [
            'theme' => $theme,
            'images' => Image::all(),
        ]);
    }

    /**
     * Update the theme settings.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $theme
     * @return \Illuminate\Http\Response
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function config(Request $request, string $theme)
    {
        $rulesPath = $this->themes->path('config/rules.php', $theme);

        try {
            $config = $this->validate($request, $this->files->getRequire($rulesPath));

            if ($request->has('append')) {
                $currentConfig = $this->themes->readConfig($theme);
                $config = static::appendConfig($currentConfig, $config);
            }

            $this->themes->updateConfig($theme, $config);

            ActionLog::log('themes.configured');

            if ($request->isXmlHttpRequest()) {
                return response()->json(['message' => 'admin.themes.config_updated']);
            }

            return redirect()->route('admin.themes.config', $theme)
                ->with('success', trans('admin.themes.config_updated'));
        } catch (FileNotFoundException) {
            return redirect()->back()->with('error', 'Invalid theme configuration.');
        }
    }

    public function changeTheme($theme = null)
    {
        if ($theme !== null && $this->themes->findDescription($theme) === null) {
            return redirect()->route('admin.themes.index')
                ->with('error', trans('admin.themes.invalid'));
        }

        if ($theme !== null && $this->themes->isLegacy($theme)) {
            return redirect()->route('admin.themes.index')
                ->with('error', trans('admin.themes.legacy'));
        }

        $this->themes->changeTheme($theme);

        ActionLog::log('themes.changed');

        return redirect()->route('admin.themes.index')
            ->with('success', trans('admin.themes.updated'));
    }

    protected static function appendConfig(array $config, array $replacement)
    {
        foreach ($replacement as $key => $value) {
            $config[$key] = is_array($value)
                ? static::appendConfig($config[$key], $value)
                : $value;
        }

        return $config;
    }
}
