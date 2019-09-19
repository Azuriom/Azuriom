<?php

namespace Azuriom\Http\Controllers\Admin;

use Azuriom\Http\Controllers\Controller;
use Azuriom\Models\Setting;
use Azuriom\Support\LangHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
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
        'argon2id' => 'Argon2id (PHP 7.3.0+)'
    ];

    public function index()
    {
        return view('admin.settings.index', [
            'languages' => LangHelper::getAvailableLanguages(),
            'timezones' => array_values(timezone_identifiers_list()),
            'currentTimezone' => config('app.timezone')
        ]);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:50'],
            'description' => ['required', 'string', 'max:255'],
            'url' => ['required', 'url'],
            'timezone' => ['required', 'timezone'],
            'locale' => ['required', 'string', Rule::in(array_keys(LangHelper::getAvailableLanguages()))]
        ]);

        $settings = $request->only(['name', 'description', 'url', 'timezone', 'locale']);

        $this->updateSettings($settings);

        return redirect()->route('admin.settings.index')->with('success', 'Settings updated');
    }

    public function security()
    {
        $show = (setting('recaptcha-site-key') && setting('recaptcha-secret-key')) || old('enable-recaptcha');

        return view('admin.settings.security', [
            'hashAlgorithms' => $this->hashAlgorithms,
            'currentHash' => config('hashing.driver'),
            'showReCaptcha' => $show
        ]);
    }

    public function updateSecurity(Request $request)
    {
        $enableReCaptcha = $request->has('enable-recaptcha');

        $this->validate($request, [
            'hash' => ['required', 'string', Rule::in(array_keys($this->hashAlgorithms))],
            'recaptcha-site-key' => $enableReCaptcha ? ['required', 'string', 'max:50'] : ['nullable'],
            'recaptcha-secret-key' => $enableReCaptcha ? ['required', 'string', 'max:50'] : ['nullable']
        ]);

        if ($enableReCaptcha) {
            $this->updateSettings($request->only(['recaptcha-site-key', 'recaptcha-secret-key']));
        } else {
            Setting::whereIn('name', ['recaptcha-site-key', 'recaptcha-secret-key'])->delete();
        }

        if ($request->input('hash') === 'argon2id' && ! defined('PASSWORD_ARGON2ID')) {
            return redirect()->back()->withErrors(['hash' => 'Argon2id is not supported'])->withInput();
        }

        $this->updateSettings($request->all(['hash']));

        return redirect()->route('admin.settings.security')->with('success', 'Settings updated');
    }

    public function performance()
    {
        return view('admin.settings.performance')->with('cacheStatus', $this->hasAdvancedCache());
    }

    public function clearCache()
    {
        $exitCode = Artisan::call('view:clear') + Artisan::call('cache:clear');

        $redirect = redirect()->route('admin.settings.performance');

        if ($exitCode !== 0) {
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

        return view('admin.settings.seo')->with('enableAnalytics', $show);
    }

    public function updateSeo(Request $request)
    {
        $this->validate($request, [
            'keywords' => ['nullable', 'string', 'max:150'],
            'g-analytics-id' => ['nullable', 'string', 'max:50'],
        ]);

        if ($request->filled('g-analytics-id')) {
            $this->updateSettings($request->only('g-analytics-id'));
        } else {
            Setting::where('name', 'g-analytics-id')->delete();
        }

        if ($request->filled('keywords')) {
            $this->updateSettings($request->only('keywords'));
        } else {
            Setting::where('name', 'keywords')->delete();
        }

        return redirect()->route('admin.settings.seo')->with('success', 'Settings updated');
    }

    public function maintenance()
    {
        return view('admin.settings.maintenance');
    }

    public function updateMaintenance(Request $request)
    {
        $this->validate($request, [

        ]);

        // TODO

        return redirect()->route('admin.settings.maintenance')->with('success', 'Soon');
    }

    private function updateSettings(array $settings)
    {
        foreach ($settings as $name => $value) {
            Setting::updateOrCreate(['name' => $name], ['value' => $value]);
        }
    }

    private function hasAdvancedCache()
    {
        return App::configurationIsCached() || App::routesAreCached();
    }
}
