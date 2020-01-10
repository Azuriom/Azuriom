<?php

namespace Azuriom\Http\Controllers\Admin;

use Azuriom\Http\Controllers\Controller;
use Azuriom\Models\ActionLog;
use Azuriom\Models\Image;
use Azuriom\Models\Setting;
use Illuminate\Cache\Repository as Cache;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;

class SettingsController extends Controller
{
    /**
     * The supported mail drivers
     *
     * @var array
     */
    private $mailEncryptionTypes = [
        'tls' => 'TLS',
        'ssl' => 'SSL',
    ];

    /**
     * The supported mail drivers
     *
     * @var array
     */
    private $mailDrivers = [
        'smtp' => 'SMTP',
        'sendmail' => 'Sendmail',
    ];

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
     * The hash algorithms PHP constants.
     *
     * @var array
     */
    private $hashCompatibility = [
        'argon' => 'PASSWORD_ARGON2I',
        'argon2id' => 'PASSWORD_ARGON2ID'
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.settings.index', [
            'images' => Image::all(),
            'icon' => setting('icon'),
            'logo' => setting('logo'),
            'locales' => $this->getAvailableLocales(),
            'timezones' => array_values(timezone_identifiers_list()),
            'currentTimezone' => config('app.timezone'),
            'copyright' => setting('copyright'),
            'conditions' => setting('conditions'),
            'money' => setting('money'),
            'register' => setting('register', true),
            'authApi' => setting('auth-api', false),
        ]);
    }

    /**
     * Update the application settings.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {
        Setting::updateSettings($this->validate($request, [
                'name' => ['required', 'string', 'max:50'],
                'description' => ['required', 'string', 'max:255'],
                'url' => ['required', 'url'],
                'timezone' => ['required', 'timezone'],
                'copyright' => ['nullable', 'string', 'max:150'],
                'conditions' => ['nullable', 'url', 'max:150'],
                'locale' => ['required', 'string', Rule::in($this->getAvailableLocaleCodes())],
                'icon' => ['nullable', 'exists:images,file'],
                'logo' => ['nullable', 'exists:images,file'],
                'money' => ['required', 'string', 'max:15']
            ]) + [
                'register' => $request->has('register'),
                'auth-api' => $request->has('auth-api'),
            ]);

        ActionLog::logUpdate('Settings');

        $response = redirect()->route('admin.settings.index')->with('success', trans('admin.settings.status.updated'));

        if (setting('register', false) !== $request->has('register') && $this->app->routesAreCached()) {
            Artisan::call('route:cache');
        }

        return $response;
    }

    /**
     * Show the application security settings.
     *
     * @return \Illuminate\Http\Response
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
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     * @throws \Exception
     */
    public function updateSecurity(Request $request)
    {
        $enableReCaptcha = $request->has('recaptcha');
        $hash = array_keys($this->hashAlgorithms);

        $settings = $this->validate($request, [
            'recaptcha-site-key' => ['required_with:recaptcha', 'max:50'],
            'recaptcha-secret-key' => ['required_with:recaptcha', 'max:50'],
            'hash' => [
                'required', 'string', Rule::in($hash), function ($attribute, $value, $fail) {
                    if (! array_key_exists($value, $this->hashCompatibility)) {
                        return;
                    }

                    if (! defined($this->hashCompatibility[$value])) {
                        $fail(trans('admin.settings.security.hash-error'));
                    }
                }
            ]
        ]);

        if ($enableReCaptcha) {
            Setting::updateSettings($settings);
        } else {
            Setting::updateSettings($request->only(['hash']));

            Setting::whereIn('name', ['recaptcha-site-key', 'recaptcha-secret-key'])->delete();
        }

        ActionLog::logUpdate('Settings');

        return redirect()->route('admin.settings.security')->with('success', trans('admin.settings.status.updated'));
    }

    public function performance()
    {
        return view('admin.settings.performance', ['cacheStatus' => $this->hasAdvancedCache()]);
    }

    /**
     * Clear the application cache.
     *
     * @return \Illuminate\Http\Response
     */
    public function clearCache()
    {
        $success = (Artisan::call('view:clear') === 0) && $this->cache->flush();

        $response = redirect()->route('admin.settings.performance');

        if (! $success) {
            return $response->with('error', trans('admin.settings.performances.cache.status.clear-error'));
        }

        return $response->with('success', trans('admin.settings.performances.cache.status.cleared'));
    }

    public function enableAdvancedCache()
    {
        $redirect = redirect()->route('admin.settings.performance');
        $cacheStatus = $this->hasAdvancedCache();

        $exitCode = Artisan::call('config:cache') + Artisan::call('route:cache');

        if ($exitCode !== 0) {
            return $redirect->with('error', trans('admin.settings.performances.boost.status.enable-error'));
        }

        return $redirect->with('success',
            trans('admin.settings.performances.boost.status.'.($cacheStatus ? 'reloaded' : 'enabled')));
    }

    public function disableAdvancedCache()
    {
        $exitCode = Artisan::call('route:clear') + Artisan::call('config:clear');

        $response = redirect()->route('admin.settings.performance');

        if ($exitCode !== 0) {
            return $response->with('error', trans('admin.settings.performances.boost.status.disable-error'));
        }

        return $response->with('success', trans('admin.settings.performances.boost.status.disabled'));
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
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updateSeo(Request $request)
    {
        Setting::updateSettings($this->validate($request, [
            'keywords' => ['nullable', 'string', 'max:150'],
            'g-analytics-id' => ['nullable', 'string', 'max:50'],
        ]));

        ActionLog::logUpdate('Settings');

        return redirect()->route('admin.settings.seo')->with('success', trans('admin.settings.status.updated'));
    }

    /**
     * Show the application mail settings.
     *
     * @return \Illuminate\Http\Response
     */
    public function mail()
    {
        return view('admin.settings.mail', [
            'drivers' => $this->mailDrivers,
            'encryptionTypes' => $this->mailEncryptionTypes
        ]);
    }

    /**
     * Update the application mail settings.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updateMail(Request $request)
    {
        $mailSettings = $this->validate($request, [
            'from-address' => ['required', 'string', 'email'],
            'encryption' => ['nullable', Rule::in(array_keys($this->mailEncryptionTypes))],
            'driver' => ['required', Rule::in(array_keys($this->mailDrivers))],
            'host' => ['required_if:driver,smtp', 'nullable', 'string'],
            'port' => ['required_if:driver,smtp', 'nullable', 'integer', 'min:1', 'max:65535'],
            'username' => ['nullable', 'string'],
            'password' => ['nullable', 'string'],
            'sendmail-path' => ['required_if:driver,sendmail', 'nullable', 'string'],
        ]);

        foreach ($mailSettings as $key => $value) {
            Setting::updateSettings('mail.'.$key, empty($value) ? null : $value);
        }

        ActionLog::logUpdate('Settings');

        return redirect()->route('admin.settings.mail')->with('success', trans('admin.settings.status.updated'));
    }

    /**
     * Show the application maintenance settings.
     *
     * @return \Illuminate\Http\Response
     */
    public function maintenance()
    {
        return view('admin.settings.maintenance');
    }

    /**
     * Update the application maintenance settings.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updateMaintenance(Request $request)
    {
        Setting::updateSettings($this->validate($request, [
            'maintenance-message' => ['nullable', 'string', 'max:255']
        ]));

        Setting::updateSettings('maintenance-status', $request->has('maintenance-status'));

        return redirect()->route('admin.settings.maintenance')->with('success', trans('admin.settings.status.updated'));
    }

    protected function hasAdvancedCache()
    {
        return $this->app->configurationIsCached() || $this->app->routesAreCached();
    }

    protected function getAvailableLocales()
    {
        return $this->getAvailableLocaleCodes()->mapWithKeys(function ($file) {
            return [$file => trans('messages.lang', [], $file)];
        });
    }

    protected function getAvailableLocaleCodes()
    {
        return collect(File::directories($this->app->langPath()))->map(function ($path) {
            return basename($path);
        });
    }
}
