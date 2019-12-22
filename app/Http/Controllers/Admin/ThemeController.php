<?php

namespace Azuriom\Http\Controllers\Admin;

use Azuriom\Extensions\ExtensionsManager;
use Azuriom\Http\Controllers\Controller;
use Azuriom\Models\ActionLog;
use Azuriom\Models\Setting;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ThemeController extends Controller
{
    /**
     * The extension manager
     *
     * @var \Azuriom\Extensions\ExtensionsManager $extensions ;
     */
    private $extensions;

    /**
     * The filesystem instance.
     *
     * @var \Illuminate\Filesystem\Filesystem
     */
    private $files;

    /**
     * Create a new ThemeController instance.
     *
     * @param  \Illuminate\Filesystem\Filesystem  $files
     * @param  \Azuriom\Extensions\ExtensionsManager  $extensions
     */
    public function __construct(Filesystem $files, ExtensionsManager $extensions)
    {
        $this->files = $files;
        $this->extensions = $extensions;
    }

    /**
     * Display a listing of the extensions.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $themes = $this->extensions->getThemesDescriptions();

        $current = $themes->pull(setting('theme', 'default'));

        return view('admin.themes.index', [
            'themes' => $themes,
            'current' => $current,
            'currentPath' => setting('theme', 'default'),
        ]);
    }

    public function edit(string $theme)
    {
        $viewPath = theme_path($theme.'/config/config.blade.php');

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
    public function update(Request $request, string $theme)
    {
        $rulesPath = theme_path($theme.'/config/rules.php');

        try {
            $validated = $this->validate($request, $this->files->getRequire($rulesPath));

            $json = json_encode($validated, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);

            $this->files->put(theme_path($theme.'/config.json'), $json);

            Cache::put('theme.config', $validated, now()->addDay());

            return redirect()->route('admin.themes.index')->with('success', 'Theme config updated');
        } catch (FileNotFoundException $e) {
            return redirect()->back()->with('error', 'Invalid theme configuration.');
        }
    }

    public function changeTheme($theme = null)
    {
        if ($theme !== null && $this->extensions->getThemeDescription($theme) === null) {
            return redirect()->route('admin.themes.index')->with('error', trans('admin.themes.status.invalid'));
        }

        Setting::updateSettings('theme', $theme);

        ActionLog::logUpdate('Theme');

        return redirect()->route('admin.themes.index')->with('success', trans('admin.themes.status.updated'));
    }
}
