<?php

use Azuriom\Extensions\Plugin\PluginManager;
use Azuriom\Extensions\Theme\ThemeManager;
use Azuriom\Games\Game;
use Azuriom\Http\Controllers\InstallController;
use Azuriom\Models\SocialLink;
use Azuriom\Support\SettingsRepository;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

if (! function_exists('add_active')) {
    /**
     * Return the active class if the current route match the given patterns, or
     * an empty string otherwise.
     */
    function add_active(string ...$patterns): string
    {
        return Route::is(...$patterns) ? 'active' : '';
    }
}

if (! function_exists('is_installed')) {
    /**
     * Determine whether the application is installed or not.
     */
    function is_installed(): bool
    {
        $key = config('app.key');

        return ! empty($key) && $key !== InstallController::TEMP_KEY;
    }
}

/*
 * Translation related helpers
 */

if (! function_exists('format_date')) {
    /**
     * Format a date using with the format corresponding to the current locale.
     */
    function format_date(Carbon $date, bool $fullTime = false): string
    {
        $format = trans('messages.date.'.($fullTime ? 'full' : 'default'));

        return $date->translatedFormat($format);
    }
}

if (! function_exists('format_date_compact')) {
    /**
     * Format a date using with the compact format corresponding to the current locale.
     */
    function format_date_compact(Carbon $date): string
    {
        return $date->format(trans('messages.date.compact'));
    }
}

if (! function_exists('trans_bool')) {
    /**
     * Translate a boolean value in the current locale.
     */
    function trans_bool(bool $bool): string
    {
        return trans('messages.'.($bool ? 'yes' : 'no'));
    }
}

if (! function_exists('money_name')) {
    /**
     * Return the money name for the given amount.
     */
    function money_name(float $money = 2): string
    {
        $moneyName = setting('money', 'points');

        return Lang::getSelector()->choose($moneyName, $money, app()->getLocale());
    }
}

if (! function_exists('format_money')) {
    /**
     * Format the given money amount with the money name.
     */
    function format_money(float $money)
    {
        return $money.' '.money_name($money);
    }
}

/*
 * Settings/Config helpers
 */
if (! function_exists('setting')) {
    /**
     * Return the value of the given setting name, or the default value if the
     * setting doesn't exist.
     */
    function setting(?string $name = null, mixed $default = null): mixed
    {
        /** @var \Azuriom\Support\SettingsRepository $settings */
        $settings = app(SettingsRepository::class);

        if ($name === null) {
            return $settings;
        }

        return $settings->get($name, $default);
    }
}

if (! function_exists('favicon')) {
    /**
     * Return the URL to configured favicon, or the default favicon.
     */
    function favicon(): string
    {
        $icon = setting('icon');

        return $icon !== null ? image_url($icon) : asset('img/azuriom.png');
    }
}

if (! function_exists('site_logo')) {
    /**
     * Return the URL to configured logo, or the default favicon.
     */
    function site_logo(): string
    {
        $logo = setting('logo');

        return $logo !== null ? image_url($logo) : asset('img/azuriom.png');
    }
}

if (! function_exists('site_name')) {
    /**
     * Return the name of the website.
     */
    function site_name(): string
    {
        return setting('name', config('app.name'));
    }
}

if (! function_exists('image_url')) {
    /**
     * Get the URL of the given image, in the public storage.
     */
    function image_url(string $name = ''): string
    {
        return url(Storage::disk('public')->url(rtrim('img/'.$name, '/')));
    }
}

if (! function_exists('social_links')) {
    function social_links(): Collection
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
     * Get the plugins' manager.
     */
    function plugins(): PluginManager
    {
        return app('plugins');
    }
}

if (! function_exists('themes')) {
    /**
     * Get the themes' manager.
     */
    function themes(): ThemeManager
    {
        return app('themes');
    }
}

if (! function_exists('plugin_path')) {
    /**
     * Get the path to a plugin directory.
     */
    function plugin_path(string $path = ''): string
    {
        return plugins()->pluginsPath($path);
    }
}

if (! function_exists('themes_path')) {
    /**
     * Get the path of the 'themes' directory.
     */
    function themes_path(string $path = ''): string
    {
        return themes()->themesPath($path);
    }
}

if (! function_exists('theme_path')) {
    /**
     * Get the path of a theme. If no theme is specified the current theme
     * is used.
     */
    function theme_path(string $path = '', ?string $theme = null): string
    {
        return themes()->path($path, $theme);
    }
}

if (! function_exists('plugin_asset')) {
    /**
     * Generate an asset path for the current theme.
     */
    function plugin_asset(string $plugin, string $path): string
    {
        return asset("plugins/{$plugin}/{$path}");
    }
}

if (! function_exists('theme_asset')) {
    /**
     * Generate an asset path for the current theme.
     */
    function theme_asset(string $path): string
    {
        return asset('themes/'.themes()->currentTheme().'/'.$path);
    }
}

if (! function_exists('theme_config')) {
    /**
     * Generate an asset path for the current theme.
     */
    function theme_config(?string $key = null, mixed $default = null): mixed
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
     */
    function game(): Game
    {
        return app('game');
    }
}

if (! function_exists('oauth_login')) {
    /**
     * Determine whether the app use OAuth login.
     */
    function oauth_login(): bool
    {
        return game()->loginWithOAuth();
    }
}

if (! function_exists('dark_theme')) {
    /**
     * Determine whether the user should have the dark theme.
     */
    function dark_theme(bool $defaultDark = false): bool
    {
        $defaultTheme = $defaultDark ? 'dark' : 'light';

        return request()?->cookie('theme', $defaultTheme) === 'dark';
    }
}

if (! function_exists('scheduler_running')) {
    /**
     * Verify if the scheduler is configured and running.
     */
    function scheduler_running(): bool
    {
        $last = setting('schedule.last');

        return $last !== null && Carbon::parse($last)->diffInHours() < 1;
    }
}

if (! function_exists('get_available_locales')) {
    /**
     * Get locales with their name
     * ex: [ ['fr' => 'Français'], ['en' => 'English'] ].
     */
    function get_available_locales()
    {
        return get_available_locales_codes()->mapWithKeys(function (string $locale) {
            return [$locale => trans('messages.lang', [], $locale)];
        });
    }
}

if (! function_exists('get_available_locales_codes')) {
    /**
     * Get availables locales within the ressources/lang folder
     * ex: ['fr', 'en'].
     */
    function get_available_locales_codes()
    {
        return collect(File::directories(resource_path('lang')))->map(function (string $path) {
            return basename($path);
        });
    }
}

if (! function_exists('get_selected_locales_codes')) {
    /**
     * Get the locales that admins offer on this website.
     */
    function get_selected_locales_codes()
    {
        return explode(',', setting('locale_available', 'en,fr'));
    }
}