<?php

namespace Azuriom\Http\Controllers\Admin;

use Azuriom\Http\Controllers\Controller;
use Azuriom\Models\ActionLog;
use Azuriom\Models\Image;
use Azuriom\Models\Setting;
use Azuriom\Support\Files;
use Azuriom\Support\Optimizer;
use DateTimeZone;
use Illuminate\Cache\Repository as Cache;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;

class SettingsController extends Controller
{
    /**
     * The supported mail drivers.
     *
     * @var array
     */
    private $mailEncryptionTypes = [
        'tls' => 'TLS',
        'ssl' => 'SSL',
    ];

    /**
     * The supported mail drivers.
     *
     * @var array
     */
    private $mailMailers = [
        'smtp' => 'SMTP',
        'sendmail' => 'Sendmail',
    ];

    /**
     * The supported hash algorithms.
     *
     * @var array
     */
    private $hashAlgorithms = [
        'bcrypt' => 'Bcrypt',
        'argon' => 'Argon2i',
        'argon2id' => 'Argon2id',
    ];

    /**
     * The hash algorithms PHP constants.
     *
     * @var array
     */
    private $hashCompatibility = [
        'argon' => 'PASSWORD_ARGON2I',
        'argon2id' => 'PASSWORD_ARGON2ID',
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
     * The Azuriom optimizer.
     *
     * @var \Azuriom\Support\Optimizer
     */
    private $optimizer;

    /**
     * Create a new controller instance.
     *
     * @param  \Illuminate\Contracts\Foundation\Application  $app
     * @param  \Illuminate\Cache\Repository  $cache
     * @param  \Azuriom\Support\Optimizer  $optimizer
     */
    public function __construct(Application $app, Cache $cache, Optimizer $optimizer)
    {
        $this->app = $app;
        $this->cache = $cache;
        $this->optimizer = $optimizer;
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
            'background' => setting('background'),
            'locales' => $this->getAvailableLocales(),
            'timezones' => DateTimeZone::listIdentifiers(),
            'currentTimezone' => config('app.timezone'),
            'copyright' => setting('copyright'),
            'conditions' => setting('conditions'),
            'money' => setting('money'),
            'siteKey' => setting('site-key'),
            'register' => setting('register', true),
            'authApi' => setting('auth-api', false),
            'minecraftVerification' => setting('game-type') === 'mc-online',
            'userMoneyTransfer' => setting('user_money_transfer'),
        ]);
    }

    /**
     * Update the application settings.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {
        Setting::updateSettings($this->validate($request, [
            'name' => ['required', 'string', 'max:50'],
            'description' => ['nullable', 'string', 'max:255'],
            'url' => ['required', 'url'],
            'timezone' => ['required', 'timezone'],
            'copyright' => ['nullable', 'string', 'max:150'],
            'conditions' => ['nullable', 'url', 'max:150'],
            'locale' => ['required', 'string', Rule::in($this->getAvailableLocaleCodes())],
            'icon' => ['nullable', 'exists:images,file'],
            'logo' => ['nullable', 'exists:images,file'],
            'background' => ['nullable', 'exists:images,file'],
            'money' => ['required', 'string', 'max:15'],
            'site-key' => ['nullable', 'string', 'size:50'],
        ]) + [
            'register' => $request->filled('register'),
            'auth-api' => $request->filled('auth-api'),
            'game-type' => $request->filled('minecraft-verification') ? 'mc-online' : 'mc-offline',
            'user_money_transfer' => $request->filled('user_money_transfer'),
        ]);

        ActionLog::log('settings.updated');

        $response = redirect()->route('admin.settings.index')->with('success', trans('admin.settings.status.updated'));

        if (setting('register', false) !== $request->filled('register')) {
            $this->optimizer->reloadRoutesCache();
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
            'showReCaptcha' => $show,
        ]);
    }

    /**
     * Update the application security settings.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
     * @throws \Illuminate\Validation\ValidationException
     * @throws \Exception
     */
    public function updateSecurity(Request $request)
    {
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
                },
            ],
        ]);

        if ($request->filled('recaptcha')) {
            Setting::updateSettings($settings);
        } else {
            Setting::updateSettings($request->only(['hash']));

            Setting::whereIn('name', ['recaptcha-site-key', 'recaptcha-secret-key'])->delete();
        }

        ActionLog::log('settings.updated');

        return redirect()->route('admin.settings.security')->with('success', trans('admin.settings.status.updated'));
    }

    public function performance()
    {
        return view('admin.settings.performance', ['cacheStatus' => $this->optimizer->isEnabled()]);
    }

    /**
     * Clear the application cache.
     *
     * @return \Illuminate\Http\Response
     */
    public function clearCache()
    {
        $response = redirect()->route('admin.settings.performance');

        if (! $this->cache->flush()) {
            return $response->with('error', trans('admin.settings.performances.cache.status.clear-error'));
        }

        return $response->with('success', trans('admin.settings.performances.cache.status.cleared'));
    }

    public function enableAdvancedCache()
    {
        $redirect = redirect()->route('admin.settings.performance');
        $cacheStatus = $this->optimizer->isEnabled();

        if (! $this->optimizer->cache()) {
            return $redirect->with('error', trans('admin.settings.performances.boost.status.enable-error'));
        }

        return $redirect->with('success',
            trans('admin.settings.performances.boost.status.'.($cacheStatus ? 'reloaded' : 'enabled')));
    }

    public function disableAdvancedCache()
    {
        $this->optimizer->clear();

        return redirect()->route('admin.settings.performance')
            ->with('success', trans('admin.settings.performances.boost.status.disabled'));
    }

    public function linkStorage()
    {
        $storagePublicPath = public_path('storage');

        Files::relativeLink(storage_path('app/public'), $storagePublicPath, true);

        return redirect()->route('admin.settings.performance')
            ->with('success', trans('messages.status-success'));
    }

    public function seo()
    {
        return view('admin.settings.seo', [
            'enableAnalytics' => setting('g-analytics-id') || old('enable-g-analytics'),
            'htmlHead' => setting('html-head'),
            'htmlBody' => setting('html-body'),
            'welcomePopup' => setting('welcome-popup'),
        ]);
    }

    /**
     * Update the application SEO settings.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updateSeo(Request $request)
    {
        $settings = $this->validate($request, [
            'keywords' => ['nullable', 'string', 'max:150'],
            'g-analytics-id' => ['nullable', 'string', 'max:50'],
            'html-head' => ['nullable', 'string'],
            'html-body' => ['nullable', 'string'],
            'welcome-popup' => ['required_with:enable_welcome_popup', 'nullable', 'string'],
        ]);

        if (! $request->filled('enable_welcome_popup')) {
            $settings['welcome-popup'] = null;
        }

        Setting::updateSettings($settings);

        ActionLog::log('settings.updated');

        return redirect()->route('admin.settings.seo')->with('success', trans('admin.settings.status.updated'));
    }

    public function socials()
    {
        return view('admin.settings.socials');
    }

    /**
     * Update the application settings.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function socialsUpdate(Request $request)
    {
        $data = $this->validate($request, [
            'services-facebook-client_id' => ['required_with:enable_facebook_login', 'nullable', 'string'],
            'services-facebook-client_secret' => ['required_with:enable_facebook_login', 'nullable', 'string'],
            'services-twitter-client_id' => ['required_with:enable_twitter_login', 'nullable', 'string'],
            'services-twitter-client_secret' => ['required_with:enable_twitter_login', 'nullable', 'string'],
            'services-steam-client_secret' => ['required_with:enable_steam_login', 'nullable', 'string'],
            'services-discord-client_id' => ['required_with:enable_discord_login', 'nullable', 'string'],
            'services-discord-client_secret' => ['required_with:enable_discord_login', 'nullable', 'string'],
            'services-google-client_id' => ['required_with:enable_google_login', 'nullable', 'string'],
            'services-google-client_secret' => ['required_with:enable_google_login', 'nullable', 'string'],
            'services-sign-in-with-apple-client_id' => ['required_with:enable_sign-in-with-apple_login', 'nullable', 'string'],
            'services-sign-in-with-apple-client_secret' => ['required_with:enable_sign-in-with-apple_login', 'nullable', 'string'],
            'overwrite_avatar' => ['required', 'in:default,minecraft,facebook,twitter,steam,discord,google'],
        ]);
        foreach ($data as $key => $value) {
            if ($key === 'services-sign-in-with-apple-client_id') {
                $key = 'services.sign-in-with-apple.client_id';
            } elseif ($key === 'services-sign-in-with-apple-client_secret') {
                $key = 'services.sign-in-with-apple.client_secret';
            } else {
                $key = str_replace('-', '.', $key);
            }
            Setting::updateSettings($key, $value);
        }
        Setting::updateSettings([
            'enable_facebook_login' => $request->filled('enable_facebook_login'),
            'enable_twitter_login' => $request->filled('enable_twitter_login'),
            'enable_steam_login' => $request->filled('enable_steam_login'),
            'enable_discord_login' => $request->filled('enable_discord_login'),
            'enable_google_login' => $request->filled('enable_google_login'),
            'enable_sign-in-with-apple_login' => $request->filled('enable_sign-in-with-apple_login'),
        ]);

        ActionLog::log('settings.updated');

        return  redirect()->route('admin.settings.socials')->with('success', trans('admin.settings.status.updated'));
    }

    /**
     * Show the application mail settings.
     *
     * @return \Illuminate\Http\Response
     */
    public function mail()
    {
        return view('admin.settings.mail', [
            'mailers' => $this->mailMailers,
            'encryptionTypes' => $this->mailEncryptionTypes,
            'smtpConfig' => config('mail.mailers.smtp', optional([])),
        ]);
    }

    /**
     * Update the application mail settings.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updateMail(Request $request)
    {
        $mailSettings = $this->validate($request, [
            'from-address' => ['required', 'string', 'email'],
            'mailer' => ['nullable', Rule::in(array_keys($this->mailMailers))],
            'smtp-host' => ['required_if:driver,smtp', 'nullable', 'string'],
            'smtp-port' => ['required_if:driver,smtp', 'nullable', 'integer', 'between:1,65535'],
            'smtp-encryption' => ['nullable', Rule::in(array_keys($this->mailEncryptionTypes))],
            'smtp-username' => ['nullable', 'string'],
            'smtp-password' => ['nullable', 'string'],
        ]);

        $mailSettings['smtp-password'] = encrypt($mailSettings['smtp-password'], false);

        if ($mailSettings['mailer'] === null) {
            $mailSettings['mailer'] = 'array';
        }

        foreach ($mailSettings as $key => $value) {
            Setting::updateSettings('mail.'.str_replace('-', '.', $key), $value);
        }

        ActionLog::log('settings.updated');

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updateMaintenance(Request $request)
    {
        Setting::updateSettings($this->validate($request, [
            'maintenance-message' => ['nullable', 'string'],
        ]));

        Setting::updateSettings('maintenance-status', $request->filled('maintenance-status'));

        return redirect()->route('admin.settings.maintenance')->with('success', trans('admin.settings.status.updated'));
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
