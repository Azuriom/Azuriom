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
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;

class SettingsController extends Controller
{
    /**
     * The supported mail drivers.
     *
     * @var array
     */
    private array $mailEncryptionTypes = [
        'tls' => 'TLS',
        'ssl' => 'SSL',
    ];

    /**
     * The supported mail drivers.
     *
     * @var array
     */
    private array $mailMailers = [
        'smtp' => 'SMTP',
        'sendmail' => 'Sendmail',
    ];

    /**
     * The supported hash algorithms.
     *
     * @var array
     */
    private array $hashAlgorithms = [
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
            'userMoneyTransfer' => setting('users.money_transfer'),
            'postsWebhook' => setting('posts_webhook'),
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
            'posts_webhook' => ['nullable', 'url'],
        ]), [
            'user_money_transfer' => $request->filled('user_money_transfer'),
            'url' => rtrim($request->input('url'), '/'), // Remove trailing end slash
        ]);

        $old = Arr::except(Setting::updateSettings($settings), 'user_money_transfer');

        ActionLog::log('settings.updated')?->createEntries($old, $settings);

        $response = redirect()->route('admin.settings.index')
            ->with('success', trans('admin.settings.updated'));

        if (setting('register', true) !== $request->filled('register')) {
            $this->optimizer->reloadRoutesCache();
        }

        $this->cache->forget('updates');

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
            'captcha' => ['nullable', 'in:recaptcha,hcaptcha,turnstile'],
            'site_key' => ['required_with:captcha', 'max:50'],
            'secret_key' => ['required_with:captcha', 'max:50'],
            'hash' => [
                'required', 'string', Rule::in($hash), function ($attribute, $value, $fail) {
                    if (! $this->isHashSupported($value)) {
                        $fail(trans('admin.settings.security.hash_error'));
                    }
                },
            ],
        ]);

        $settings = array_merge($request->only('hash'), [
            'admin.force_2fa' => $request->filled('force_2fa'),
        ]);

        if ($request->filled('captcha')) {
            $settings = array_merge($settings, [
                'captcha.type' => $request->input('captcha'),
                'captcha.site_key' => $request->input('site_key'),
                'captcha.secret_key' => $request->input('secret_key'),
            ]);
        } else {
            $settings = array_merge($settings, [
                'captcha.type' => null,
                'captcha.site_key' => null,
                'captcha.secret_key' => null,
            ]);
        }

        $old = Setting::updateSettings($settings);

        ActionLog::log('settings.updated')?->createEntries($old, $settings);

        return redirect()->route('admin.settings.auth')
            ->with('success', trans('admin.settings.updated'));
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
            return $response->with('error', trans('admin.settings.performances.cache.error'));
        }

        app(Optimizer::class)->clearViewCache();

        return $response->with('success', trans('messages.status.success'));
    }

    public function enableAdvancedCache()
    {
        $redirect = redirect()->route('admin.settings.performance');

        if (! $this->optimizer->cache()) {
            return $redirect->with('error', trans('admin.settings.performances.boost.error'));
        }

        return $redirect->with('success', trans('messages.status.success'));
    }

    public function disableAdvancedCache()
    {
        $this->optimizer->clear();

        return redirect()->route('admin.settings.performance')
            ->with('success', trans('messages.status.success'));
    }

    public function linkStorage()
    {
        $target = storage_path('app/public');
        $link = public_path('storage');

        Files::removeLink($link);

        Files::relativeLink($target, $link);

        return redirect()->route('admin.settings.performance')
            ->with('success', trans('messages.status.success'));
    }

    public function seo()
    {
        return view('admin.settings.seo', [
            'homeMessage' => setting('home_message'),
            'welcomeAlert' => setting('welcome_alert'),
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
        $this->validate($request, [
            'home_message' => ['nullable', 'string'],
            'welcome_alert' => ['required_with:enable_welcome_alert', 'nullable', 'string'],
        ]);

        $alert = $request->filled('enable_welcome_alert')
            ? $request->input('welcome_alert')
            : null;

        Setting::updateSettings([
            'home_message' => $request->input('home_message'),
            'welcome_alert' => $alert,
        ]);

        ActionLog::log('settings.updated');

        return redirect()->route('admin.settings.seo')
            ->with('success', trans('admin.settings.updated'));
    }

    public function auth(Request $request)
    {
        return view('admin.settings.authentification', [
            'conditions' => setting('conditions'),
            'userNameChange' => setting('user.change_name'),
            'userDelete' => setting('user.delete'),
            'register' => setting('register', true),
            'authApi' => setting('auth_api', false),
            'hashAlgorithms' => $this->hashAlgorithms,
            'currentHash' => config('hashing.driver'),
            'captchaType' => old('captcha', setting('captcha.type')),
            'force2fa' => setting('admin.force_2fa'),
            'canForce2fa' => $request->user()->hasTwoFactorAuth(),
        ]);
    }

    public function updateAuth(Request $request)
    {
        $settings = $this->validate($request, [
            'conditions' => ['nullable', 'url', 'max:150'],
        ]) + [
            'register' => $request->filled('register'),
            'auth_api' => $request->filled('auth_api'),
            'user.change_name' => $request->filled('user_change_name'),
            'user.delete' => $request->filled('user_delete'),
        ];

        Setting::updateSettings($settings);

        ActionLog::log('settings.updated');

        return redirect()->route('admin.settings.auth')
            ->with('success', trans('admin.settings.updated'));
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

        if ($mailSettings['mailer'] === null) {
            $mailSettings['mailer'] = 'array';
            $mailSettings['users_email_verification'] = false;
        }

        if (Arr::get($mailSettings, 'smtp-password') === null) {
            unset($mailSettings['smtp-password']);
        }

        foreach ($mailSettings as $key => $value) {
            Setting::updateSettings('mail.'.str_replace('-', '.', $key), $value);
        }

        ActionLog::log('settings.updated');

        return redirect()->route('admin.settings.mail')
            ->with('success', trans('admin.settings.updated'));
    }

    public function sendTestMail(Request $request)
    {
        if ($request->user()->email === null) {
            return response()->json([
                'message' => trans('admin.settings.mail.missing'),
            ], 400);
        }

        try {
            $request->user()->notify(new TestMail());
        } catch (Exception $e) {
            return response()->json([
                'message' => trans('messages.status.error', [
                    'error' => $e->getMessage(),
                ]),
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
        return view('admin.settings.maintenance', [
            'status' => setting('maintenance.enabled', false),
            'message' => setting('maintenance.message'),
            'paths' => setting('maintenance.paths'),
        ]);
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
        $this->validate($request, [
            'maintenance_message' => ['nullable', 'string'],
        ]);

        $paths = $request->filled('is_global')
            ? null
            : array_filter($request->input('paths', []));

        Setting::updateSettings([
            'maintenance.enabled' => $request->filled('maintenance_status'),
            'maintenance.message' => $request->input('maintenance_message'),
            'maintenance.paths' => empty($paths) ? null : $paths,
        ]);

        return redirect()->route('admin.settings.maintenance')
            ->with('success', trans('admin.settings.updated'));
    }

    protected function getAvailableLocales()
    {
        return $this->getAvailableLocaleCodes()->mapWithKeys(fn (string $file) => [
            $file => trans('messages.lang', [], $file),
        ]);
    }

    protected function getAvailableLocaleCodes()
    {
        return collect(File::directories($this->app->langPath()))
            ->map(fn (string $path) => basename($path));
    }

    protected function isHashSupported(string $algo)
    {
        if ($algo === 'bcrypt') {
            return true;
        }

        try {
            $hashManager = $this->app->make(HashManager::class);

            return $hashManager->driver($algo)->make('hello') !== null;
        } catch (Exception) {
            return false;
        }
    }
}
