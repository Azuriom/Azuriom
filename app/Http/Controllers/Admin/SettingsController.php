<?php

namespace Azuriom\Http\Controllers\Admin;

use Azuriom\Http\Controllers\Controller;
use Azuriom\Models\Setting;
use Azuriom\Support\LangHelper;
use DateTimeZone;
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
        return view('admin.settings.index')
            ->with('languages', LangHelper::getAvailableLanguages())
            ->with('timezones', array_values(DateTimeZone::listIdentifiers(DateTimeZone::ALL)))
            ->with('currentTimezone', config('app.timezone'));
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
        $show = (setting('recaptcha-site-key') && setting('recaptcha-site-key')) || old('enable-recaptcha');

        return view('admin.settings.security')
            ->with('hashAlgorithms', $this->hashAlgorithms)
            ->with('currentHash', config('hashing.driver'))
            ->with('showReCaptcha', $show);
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

        $this->updateSettings($request->all(['hash']));

        return redirect()->route('admin.settings.security')->with('success', 'Settings updated');
    }

    public function performance()
    {
        $cacheStatus = App::configurationIsCached() || App::routesAreCached();

        return view('admin.settings.performance')->with('cacheStatus', $cacheStatus);
    }

    public function clearCache()
    {
        $exitCode = Artisan::call('view:clear') + Artisan::call('cache:clear');

        if ($exitCode !== 0) {
            return redirect()->route('admin.settings.performance')->with('error', 'Error while clearing cache');
        }

        return redirect()->route('admin.settings.performance')->with('success', 'Cache cleared with success');
    }

    public function enableAdvancedCache()
    {
        $exitCode = Artisan::call('config:cache') + Artisan::call('route:cache');

        if ($exitCode !== 0) {
            return redirect()->route('admin.settings.performance')->with('error', 'Error while enabling RocketBooster');
        }

        return redirect()->route('admin.settings.performance')->with('success', 'RocketBooster enabled');
    }

    public function disableAdvancedCache()
    {
        $exitCode = Artisan::call('route:clear') + Artisan::call('config:clear');

        if ($exitCode !== 0) {
            return redirect()->route('admin.settings.performance')->with('error',
                'Error while disabling RocketBooster');
        }

        return redirect()->route('admin.settings.performance')->with('success', 'RocketBooster disabled');
    }

    public function seo()
    {
        $show = setting('g-analytics-key') || old('enable-g-analytics');

        return view('admin.settings.seo')->with('enableAnalytics', $show);
    }

    public function updateSeo(Request $request)
    {
        $enable = $request->has('enable-g-analytics');

        $this->validate($request, [
            'g-analytics-key' => $enable ? ['required', 'string', 'max:50'] : ['nullable'],
        ]);

        if ($enable) {
            $this->updateSettings($request->only('g-analytics-key'));

        } else {
            Setting::where('name', 'g-analytics-key')->delete();
        }

        return redirect()->route('admin.settings.seo')->with('success', 'Settings updated');
    }

    private function updateSettings(array $settings)
    {
        foreach ($settings as $name => $value) {
            Setting::updateOrCreate(['name' => $name], ['value' => $value]);
        }
    }
}
