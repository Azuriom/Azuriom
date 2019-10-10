<?php

namespace Azuriom\Http\Controllers\Admin;

use Azuriom\Http\Controllers\Controller;
use Azuriom\Models\ActionLog;
use Azuriom\Models\Setting;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;

class ThemeController extends Controller
{
    public function index()
    {
        $themes = collect(File::directories(theme_path()))->mapWithKeys(function ($path) {
            $name = File::name($path);
            $info = $this->getThemeInfo($name);

            return $info ? [$name => $info] : null;
        })->filter(function ($info) {
            return $info !== null;
        });

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
        if ($theme === null) {
            Setting::where('name', 'theme')->delete();
            return redirect()->route('admin.themes.index')->with('success', 'Theme updated.');
        }

        if ($this->getThemeInfo($theme) === null) {
            return redirect()->route('admin.themes.index')->with('error', 'Invalid theme.');
        }

        Setting::updateSettings('theme', $theme);

        ActionLog::logUpdate('Theme');

        return redirect()->route('admin.themes.index')->with('success', 'Theme updated.');
    }

    private function getThemeInfo(string $theme)
    {
        $themePath = theme_path($theme.'/theme.json');

        if (! File::exists($themePath)) {
            return null;
        }

        $json = File::get($themePath);

        return $json ? json_decode($json) : null;
    }
}
