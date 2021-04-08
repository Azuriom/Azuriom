<?php

namespace Azuriom\Http\Controllers\Admin;

use Azuriom\Http\Controllers\Controller;
use Azuriom\Models\ActionLog;
use Azuriom\Models\Image;
use Azuriom\Models\Setting;
use Azuriom\Notifications\TestMail;
use Azuriom\Support\Files;
use Azuriom\Support\Optimizer;
use DateTimeZone;
use Exception;
use Illuminate\Contracts\Cache\Repository as Cache;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Hashing\HashManager;
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
     * The application instance.
     *
     * @var \Illuminate\Contracts\Foundation\Application
     */
    private $app;

    /**
     * The application cache.
     *
     * @var \Illuminate\Contracts\Cache\Repository
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
     * @param  \Illuminate\Contracts\Cache\Repository  $cache
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
        $settings = array_merge($this->validate($request, [
            'name' => ['required', 'string', 'max:50'],
            'description' => ['nullable', 'string', 'max:255'],
            'url' => ['required', 'url'],
            'timezone' => ['required', 'timezone'],
            'copyright' => ['nullable', 'string', 'max:150'],
            'keywords' => ['nullable', 'string', 'max:150'],
            'locale' => ['required', 'string', Rule::in($this->getAvailableLocaleCodes())],
            'icon' => ['nullable', 'exists:images,file'],
            'logo' => ['nullable', 'exists:images,file'],
            'background' => ['nullable', 'exists:images,file'],
            'money' => ['required', 'string', 'max:15'],
            'site-key' => ['nullable', 'string', 'size:50'],
        ]), [
            'user_money_transfer' => $request->filled('user_money_transfer'),
            'url' => rtrim($request->input('url'), '/'), // Remove trailing end slash
        ]);

        Setting::updateSettings($settings);

        ActionLog::log('settings.updated');

        $response = redirect()->route('admin.settings.index')->with('success', trans('admin.settings.status.updated'));

        if (setting('register', true) !== $request->filled('register')) {
            $this->optimizer->reloadRoutesCache();
        }

        return $response;
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

        $this->validate($request, [
            'captcha' => ['nullable', 'in:recaptcha,hcaptcha'],
            'site_key' => ['required_with:captcha', 'max:50'],
            'secret_key' => ['required_with:captcha', 'max:50'],
            'hash' => [
                'required', 'string', Rule::in($hash), function ($attribute, $value, $fail) {
                    if (! $this->isHashSupported($value)) {
                        $fail(trans('admin.settings.security.hash-error'));
                    }
                },
            ],
        ]);

        Setting::updateSettings($request->only('hash'));

        if ($request->filled('captcha')) {
            Setting::updateSettings([
                'captcha.type' => $request->input('captcha'),
                'captcha.site_key' => $request->input('site_key'),
                'captcha.secret_key' => $request->input('secret_key'),
            ]);
        } else {
            Setting::updateSettings([
                'captcha.type' => null,
                'captcha.site_key' => null,
                'captcha.secret_key' => null,
            ]);
        }

        ActionLog::log('settings.updated');

        return redirect()->route('admin.settings.auth')->with('success', trans('admin.settings.status.updated'));
    }

    public function performance()
    {
        return view('admin.settings.performance', [
            'cacheStatus' => $this->optimizer->isEnabled(),
        ]);
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

        $message = trans('admin.settings.performances.boost.status.'.($cacheStatus ? 'reloaded' : 'enabled'));

        return $redirect->with('success', $message);
    }

    public function disableAdvancedCache()
    {
        $this->optimizer->clear();

        return redirect()->route('admin.settings.performance')
            ->with('success', trans('admin.settings.performances.boost.status.disabled'));
    }

    public function linkStorage()
    {
        $target = storage_path('app/public');
        $link = public_path('storage');

        Files::removeLink($link);

        Files::relativeLink($target, $link);

        return redirect()->route('admin.settings.performance')
            ->with('success', trans('messages.status-success'));
    }

    public function seo()
    {
        return view('admin.settings.seo', [
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

    public function auth()
    {
        return view('admin.settings.authentification', [
            'conditions' => setting('conditions'),
            'register' => setting('register', true),
            'authApi' => setting('auth-api', false),
            'minecraftVerification' => setting('game-type') === 'mc-online',
            'hashAlgorithms' => $this->hashAlgorithms,
            'currentHash' => config('hashing.driver'),
            'captchaType' => old('captcha', setting('captcha.type')),
        ]);
    }

    public function updateAuth(Request $request)
    {
        $settings = $this->validate($request, [
            'conditions' => ['nullable', 'url', 'max:150'],
        ]) + [
            'register' => $request->filled('register'),
            'auth-api' => $request->filled('auth-api'),
        ];

        Setting::updateSettings($settings);

        ActionLog::log('settings.updated');

        return redirect()->route('admin.settings.auth')->with('success', trans('admin.settings.status.updated'));
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
        ]) + [
            'users_email_verification' => $request->filled('users_email_verification'),
        ];

        $mailSettings['smtp-password'] = encrypt($mailSettings['smtp-password'], false);

        if ($mailSettings['mailer'] === null) {
            $mailSettings['mailer'] = 'array';
            $mailSettings['users_email_verification'] = false;
        }

        foreach ($mailSettings as $key => $value) {
            Setting::updateSettings('mail.'.str_replace('-', '.', $key), $value);
        }

        ActionLog::log('settings.updated');

        return redirect()->route('admin.settings.mail')->with('success', trans('admin.settings.status.updated'));
    }

    public function sendTestMail(Request $request)
    {
        try {
            $request->user()->notify(new TestMail());
        } catch (Exception $e) {
            return response()->json([
                'message' => trans('messages.status-error', ['error' => $e->getMessage()]),
            ], 500);
        }

        return response()->json(['message' => trans('admin.settings.mail.sent')]);
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
        return $this->getAvailableLocaleCodes()->mapWithKeys(function (string $file) {
            return [$file => trans('messages.lang', [], $file)];
        });
    }

    protected function getAvailableLocaleCodes()
    {
        return collect(File::directories($this->app->langPath()))->map(function (string $path) {
            return basename($path);
        });
    }

    protected function isHashSupported(string $algo)
    {
        if ($algo === 'bcrypt') {
            return true;
        }

        try {
            $hashManager = $this->app->make(HashManager::class);

            return $hashManager->driver($algo)->make('hello') !== null;
        } catch (Exception $e) {
            return false;
        }
    }
}
