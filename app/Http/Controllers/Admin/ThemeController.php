<?php

namespace Azuriom\Http\Controllers\Admin;

use Azuriom\Http\Controllers\Controller;
use Azuriom\Models\ActionLog;
use Azuriom\Models\Setting;
use Illuminate\Support\Facades\File;

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

        return view('admin.themes.index')->with('themes', $themes);
    }

    public function changeTheme($theme = null)
    {
        if ($theme == null) {
            Setting::where('name', 'theme')->delete();
            return redirect()->route('admin.themes.index')->with('success', 'Theme updated.');
        }

        if ($this->getThemeInfo($theme) === null) {
            return redirect()->route('admin.themes.index')->with('error', 'Invalid theme.');
        }

        Setting::updateOrCreate(['name' => 'theme'], ['value' => $theme]);

        ActionLog::logEdit('Theme');

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
