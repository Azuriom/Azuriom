<?php

use Azuriom\Http\Controllers\InstallController;
use Azuriom\Models\SocialLink;
use Azuriom\Support\SettingsRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

if (! function_exists('add_active')) {
    function add_active(string ...$patterns)
    {
        return Route::is(...$patterns) ? 'active' : '';
    }
}

if (! function_exists('color_contrast')) {
    function color_contrast(string $hex)
    {
        $r = hexdec(substr($hex, 1, 2));
        $g = hexdec(substr($hex, 3, 2));
        $b = hexdec(substr($hex, 5, 2));
        $yiq = (($r * 299) + ($g * 587) + ($b * 114)) / 1000;

        return ($yiq >= 128) ? 'black' : 'white';
    }
}

if (! function_exists('is_installed')) {
    function is_installed()
    {
        $key = config('app.key');

        return ! empty($key) && $key !== InstallController::TEMP_KEY;
    }
}

/*
 * Translation related helpers
 */

if (! function_exists('format_date')) {
    function format_date(Carbon $date, bool $fullTime = false)
    {
        $format = trans('messages.date.'.($fullTime ? 'full' : 'default'));

        return $date->translatedFormat($format);
    }
}

if (! function_exists('format_date_compact')) {
    function format_date_compact(Carbon $date)
    {
        return $date->format(trans('messages.date.compact'));
    }
}

if (! function_exists('trans_bool')) {
    function trans_bool(bool $bool)
    {
        return trans('messages.'.($bool ? 'yes' : 'no'));
    }
}

if (! function_exists('money_name')) {
    function money_name($money = 2)
    {
        $moneyName = setting('money', 'points');

        return trans()->getSelector()->choose($moneyName, $money, app()->getLocale());
    }
}

if (! function_exists('format_money')) {
    function format_money(float $money)
    {
        return $money.' '.money_name($money);
    }
}

/*
 * Settings/Config helpers
 */
if (! function_exists('setting')) {
    function setting(string $name = null, $default = null)
    {
        $settings = app(SettingsRepository::class);

        if ($name === null) {
            return $settings;
        }

        return $settings->get($name, $default);
    }
}

if (! function_exists('favicon')) {
    function favicon()
    {
        $icon = setting('icon');

        return $icon !== null ? image_url($icon) : asset('img/azuriom.png');
    }
}

if (! function_exists('site_logo')) {
    function site_logo()
    {
        $logo = setting('logo');

        return $logo !== null ? image_url($logo) : asset('img/azuriom.png');
    }
}

if (! function_exists('site_name')) {
    function site_name()
    {
        return setting('name', config('app.name'));
    }
}

if (! function_exists('image_url')) {
    function image_url(string $name = '')
    {
        return url(Storage::disk('public')->url(rtrim('img/'.$name, '/')));
    }
}

if (! function_exists('social_links')) {
    function social_links()
    {
        return Cache::remember(SocialLink::CACHE_KEY, now()->addDay(), function () {
            return SocialLink::orderBy('position')->get();
        });
    }
}

/*
 * Extensions helpers
 */

if (! function_exists('plugins')) {
    /**
     * Get the plugins manager.
     *
     * @return \Azuriom\Extensions\Plugin\PluginManager
     */
    function plugins()
    {
        return app('plugins');
    }
}

if (! function_exists('themes')) {
    /**
     * Get the themes manager.
     *
     * @return \Azuriom\Extensions\Theme\ThemeManager
     */
    function themes()
    {
        return app('themes');
    }
}

if (! function_exists('plugin_path')) {
    function plugin_path(string $path = '')
    {
        return plugins()->pluginsPath($path);
    }
}

if (! function_exists('themes_path')) {
    /**
     * Get the path of the themes directory.
     *
     * @param  string  $path
     * @return string
     */
    function themes_path(string $path = '')
    {
        return themes()->themesPath($path);
    }
}

if (! function_exists('theme_path')) {
    /**
     * Get the path of a theme. If no theme is specified the current theme
     * is used.
     *
     * @param  string  $path
     * @param  string|null  $theme
     * @return string
     */
    function theme_path(string $path = '', string $theme = null)
    {
        return themes()->path($path, $theme);
    }
}

if (! function_exists('plugin_asset')) {
    /**
     * Generate an asset path for the current theme.
     *
     * @param  string  $plugin
     * @param  string  $path
     * @return string
     */
    function plugin_asset(string $plugin, string $path)
    {
        return asset("plugins/{$plugin}/{$path}");
    }
}

if (! function_exists('theme_asset')) {
    /**
     * Generate an asset path for the current theme.
     *
     * @param  string  $path
     * @return string
     */
    function theme_asset(string $path)
    {
        return asset('themes/'.themes()->currentTheme().'/'.$path);
    }
}

if (! function_exists('theme_config')) {
    /**
     * Generate an asset path for the current theme.
     *
     * @param  string|null  $key
     * @param  mixed|null  $default
     * @return mixed
     */
    function theme_config(string $key = null, mixed $default = null)
    {
        return $key === null ? config('theme') : config('theme.'.$key, $default);
    }
}

/*
 * Other helpers
 */

if (! function_exists('game')) {
    /**
     * Get the current game bridge implementation.
     *
     * @return \Azuriom\Games\Game
     */
    function game()
    {
        return app('game');
    }
}

if (! function_exists('oauth_login')) {
    function oauth_login()
    {
        return game()->loginWithOAuth();
    }
}

if (! function_exists('dark_theme')) {
    function dark_theme()
    {
        return request()?->cookie('theme') === 'dark';
    }
}
