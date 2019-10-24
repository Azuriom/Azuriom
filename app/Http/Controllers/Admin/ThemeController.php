<?php

namespace Azuriom\Http\Controllers\Admin;

use Azuriom\Extensions\ExtensionsManager;
use Azuriom\Http\Controllers\Controller;
use Azuriom\Models\ActionLog;
use Azuriom\Models\Setting;
use Illuminate\Support\Facades\View;

class ThemeController extends Controller
{
    /**
     * The extension manager
     *
     * @var \Azuriom\Extensions\ExtensionsManager $extensions ;
     */
    private $extensions;

    /**
     * ThemeController constructor.
     * @param  \Azuriom\Extensions\ExtensionsManager  $extensions
     */
    public function __construct(ExtensionsManager $extensions)
    {
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
            'current' => $current
        ]);
    }

    public function edit()
    {
        if (! View::exists('config')) {
            return redirect()->route('admin.themes.index')->with('error', 'This theme don\'t have config');
        }

        return view('config');
    }

    public function changeTheme($theme = null)
    {
        if ($theme !== null && $this->extensions->getThemeDescription($theme) === null) {
            return redirect()->route('admin.themes.index')->with('error', 'Invalid theme.');
        }

        Setting::updateSettings('theme', $theme);

        ActionLog::logUpdate('Theme');

        return redirect()->route('admin.themes.index')->with('success', 'Theme updated.');
    }
}
