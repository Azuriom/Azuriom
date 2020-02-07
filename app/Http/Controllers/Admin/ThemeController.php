<?php

namespace Azuriom\Http\Controllers\Admin;

use Azuriom\Extensions\Theme\ThemeManager;
use Azuriom\Http\Controllers\Controller;
use Azuriom\Models\ActionLog;
use Azuriom\Models\Setting;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
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
        $themes = collect($this->themes->findThemesDescriptions());
        $availableThemes = collect($this->themes->getOnlineThemes());

        $current = null;

        if ($this->themes->hasTheme()) {
            $current = $themes->pull($this->themes->currentTheme());
        }

        $currentThemeConfig = $this->themes->path('config/rules.php', $this->themes->currentTheme());

        return view('admin.themes.index', [
            'themes' => $themes,
            'current' => $current,
            'currentPath' => setting('theme', 'default'),
            'currentHasConfig' => $this->files->isFile($currentThemeConfig),
            'availableThemes' => $availableThemes,
            'themesUpdates' => collect($this->themes->getThemesToUpdate()),
        ]);
    }

    public function update(string $theme)
    {
        $description = $this->themes->findDescription($theme);

        try {
            if ($description !== null && isset($description->apiId)) {
                $this->themes->install($description->apiId);
            }
        } catch (Throwable $t) {
            report($t);

            return redirect()->route('admin.themes.index')->with('error', trans('messages.status-error', [
                'error' => $t->getMessage(),
            ]));
        }

        return redirect()->route('admin.themes.index')->with('success', trans('admin.themes.status.installed'));
    }

    public function download(string $themeId)
    {
        try {
            $this->themes->install($themeId);
        } catch (Throwable $t) {
            report($t);

            return redirect()->route('admin.themes.index')->with('error', trans('messages.status-error', [
                'error' => $t->getMessage(),
            ]));
        }

        return redirect()->route('admin.themes.index')->with('success', trans('admin.themes.status.installed'));
    }

    public function delete(string $theme)
    {
        if ($this->themes->currentTheme() === $theme) {
            return redirect()->route('admin.themes.index')->with('error', trans('admin.themes.status.error-delete'));
        }

        $this->themes->delete($theme);

        return redirect()->route('admin.themes.index')->with('success', trans('admin.themes.status.deleted'));
    }

    public function edit(string $theme)
    {
        $viewPath = $this->themes->path('config/config.blade.php', $theme);

        if (! $this->files->exists($viewPath)) {
            return redirect()->route('admin.themes.index')->with('error', trans('admin.themes.status.no-config'));
        }

        return view()->file($viewPath, ['theme' => setting('theme')]);
    }

    /**
     * Update the theme settings.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $theme
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function config(Request $request, string $theme)
    {
        $rulesPath = $this->themes->path('config/rules.php', $theme);

        try {
            $validated = $this->validate($request, $this->files->getRequire($rulesPath));

            $json = json_encode($validated, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);

            $this->files->put($this->themes->path('config.json', $theme), $json);

            Cache::put('theme.config', $validated, now()->addDay());

            return redirect()->route('admin.themes.index')->with('success',
                trans('admin.themes.status.config-updated'));
        } catch (FileNotFoundException $e) {
            return redirect()->back()->with('error', 'Invalid theme configuration.');
        }
    }

    public function changeTheme($theme = null)
    {
        if ($theme !== null && $this->themes->findDescription($theme) === null) {
            return redirect()->route('admin.themes.index')->with('error', trans('admin.themes.status.invalid'));
        }

        Setting::updateSettings('theme', $theme);

        ActionLog::log('themes.changed');

        Cache::forget('theme.config');

        return redirect()->route('admin.themes.index')->with('success', trans('admin.themes.status.updated'));
    }
}
