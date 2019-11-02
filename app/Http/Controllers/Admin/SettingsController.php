<?php

namespace Azuriom\Http\Controllers\Admin;

use Azuriom\Http\Controllers\Controller;
use Azuriom\Models\ActionLog;
use Azuriom\Models\Image;
use Azuriom\Models\Setting;
use Azuriom\Support\LangHelper;
use Illuminate\Cache\Repository as Cache;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Validation\Rule;

class SettingsController extends Controller
{
    /**
     * The supported hash algorithms
     *
     * @var array
     */
    private $hashAlgorithms = [
        'bcrypt' => 'Bcrypt',
        'argon' => 'Argon2i',
        'argon2id' => 'Argon2id'
    ];

    /**
     * The application instance.
     *
     * @var \Illuminate\Contracts\Foundation\Application
     */
    private $app;

    /**
     * The application cache.
     *
     * @var \Illuminate\Cache\Repository
     */
    private $cache;

    /**
     * SettingsController constructor.
     * @param  \Illuminate\Contracts\Foundation\Application  $app
     * @param  \Illuminate\Cache\Repository  $cache
     */
    public function __construct(Application $app, Cache $cache)
    {
        $this->app = $app;
        $this->cache = $cache;
    }

    /**
     * Show the application settings.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        return view('admin.settings.index', [
            'images' => Image::all(),
            'icon' => setting('icon'),
            'logo' => setting('logo'),
            'languages' => LangHelper::getAvailableLanguages(),
            'timezones' => array_values(timezone_identifiers_list()),
            'currentTimezone' => config('app.timezone')
        ]);
    }

    /**
     * Update the application settings.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:50'],
            'description' => ['required', 'string', 'max:255'],
            'url' => ['required', 'url'],
            'timezone' => ['required', 'timezone'],
            'copyright' => ['nullable', 'string', 'max:150'],
            'locale' => ['required', 'string', Rule::in(array_keys(LangHelper::getAvailableLanguages()))],
            'icon' => ['nullable', 'exists:images,file']
        ]);

        Setting::updateSettings($request->only([
            'name', 'description', 'url', 'timezone', 'locale', 'icon', 'logo', 'copyright'
        ]));

        ActionLog::logUpdate('Settings');

        return redirect()->route('admin.settings.index')->with('success', 'Settings updated');
    }

    /**
     * Show the application security settings.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function security()
    {
        $show = (setting('recaptcha-site-key') && setting('recaptcha-secret-key')) || old('recaptcha');

        return view('admin.settings.security', [
            'hashAlgorithms' => $this->hashAlgorithms,
            'currentHash' => config('hashing.driver'),
            'showReCaptcha' => $show
        ]);
    }

    /**
     * Update the application security settings.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updateSecurity(Request $request)
    {
        $enableReCaptcha = $request->has('recaptcha');

        $this->validate($request, [
            'hash' => ['required', 'string', Rule::in(array_keys($this->hashAlgorithms))],
            'recaptcha-site-key' => ['required_with:recaptcha', 'max:50'],
            'recaptcha-secret-key' => ['required_with:recaptcha', 'max:50']
        ]);

        if ($enableReCaptcha) {
            Setting::updateSettings($request->only(['recaptcha-site-key', 'recaptcha-secret-key']));
        } else {
            Setting::whereIn('name', ['recaptcha-site-key', 'recaptcha-secret-key'])->delete();
        }

        if ($request->input('hash') === 'argon2id' && ! defined('PASSWORD_ARGON2ID')) {
            return redirect()->back()->withErrors(['hash' => 'Argon2id is not supported'])->withInput();
        }

        Setting::updateSettings($request->only(['hash']));

        ActionLog::logUpdate('Settings');

        return redirect()->route('admin.settings.security')->with('success', 'Settings updated');
    }

    public function performance()
    {
        return view('admin.settings.performance', ['cacheStatus' => $this->hasAdvancedCache()]);
    }

    /**
     * Clear the application cache.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function clearCache()
    {
        $success = (Artisan::call('view:clear') === 0) && $this->cache->flush();

        $redirect = redirect()->route('admin.settings.performance');

        if (! $success) {
            return $redirect->with('error', 'Error while clearing cache');
        }

        return $redirect->with('success', 'Cache cleared with success');
    }

    public function enableAdvancedCache()
    {
        $redirect = redirect()->route('admin.settings.performance');
        $cacheStatus = $this->hasAdvancedCache();

        $exitCode = Artisan::call('config:cache') + Artisan::call('route:cache');

        if ($exitCode !== 0) {
            return $redirect->with('error', 'Error while enabling RocketBooster');
        }

        return $redirect->with('success', $cacheStatus ? 'RocketBooster reloaded' : 'RocketBooster enabled');
    }

    public function disableAdvancedCache()
    {
        $exitCode = Artisan::call('route:clear') + Artisan::call('config:clear');

        $redirect = redirect()->route('admin.settings.performance');

        if ($exitCode !== 0) {
            return $redirect->with('error', 'Error while disabling RocketBooster');
        }

        return $redirect->with('success', 'RocketBooster disabled');
    }

    public function seo()
    {
        $show = setting('g-analytics-id') || old('enable-g-analytics');

        return view('admin.settings.seo', ['enableAnalytics' => $show]);
    }

    /**
     * Update the application SEO settings.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updateSeo(Request $request)
    {
        $this->validate($request, [
            'keywords' => ['nullable', 'string', 'max:150'],
            'g-analytics-id' => ['nullable', 'string', 'max:50'],
        ]);

        Setting::updateSettings($request->only(['g-analytics-id', 'keywords']));

        ActionLog::logUpdate('Settings');

        return redirect()->route('admin.settings.seo')->with('success', 'Settings updated');
    }

    /**
     * Show the application maintenance settings.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function maintenance()
    {
        return view('admin.settings.maintenance');
    }

    /**
     * Update the application maintenance settings.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updateMaintenance(Request $request)
    {
        $this->validate($request, [
            'maintenance-message' => ['required', 'string', 'max:250']
        ]);

        $request->checkbox('maintenance-status');

        Setting::updateSettings($request->only(['maintenance-message', 'maintenance-status']));

        return redirect()->route('admin.settings.maintenance')->with('success', 'Maintenance status updated');
    }

    private function hasAdvancedCache()
    {
        return $this->app->configurationIsCached() || $this->app->routesAreCached();
    }
}
