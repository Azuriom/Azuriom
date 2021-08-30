<?php

namespace Azuriom\Providers;

use Azuriom\Models\Setting;
use Azuriom\Support\SettingsRepository;
use Exception;
use Illuminate\Config\Repository as Config;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class SettingServiceProvider extends ServiceProvider
{
    /**
     * The settings that are encrypted for storage.
     *
     * @var array
     */
    protected $encrypted = [
        'mail.smtp.password',
    ];

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(SettingsRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @param  \Illuminate\Config\Repository  $config
     * @return void
     *
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function boot(Config $config)
    {
        $repo = $this->app->make(SettingsRepository::class);

        if (! is_installed()) {
            return;
        }

        try {
            $settings = $this->loadSettings();

            foreach ($settings as $name => $value) {
                switch ($name) {
                    case 'name':
                        $config->set('mail.from.name', $value);
                        break;
                    case 'locale':
                        $this->app->setLocale($value);
                        break;
                    case 'timezone':
                        date_default_timezone_set($value);
                    // no break
                    case 'url':
                        $config->set('app.'.$name, $value);
                        break;
                    case 'hash':
                        if ($config->get('hashing.driver') !== $value) {
                            $config->set('hashing.driver', $value);
                        }
                        break;
                    case 'mail.mailer':
                        $config->set('mail.default', $value);
                        break;
                }

                if (in_array($name, $this->encrypted, true)) {
                    try {
                        $value = decrypt($value, false);
                    } catch (DecryptException $e) {
                        $value = null;
                    }
                }

                if (Str::startsWith($name, 'mail.')) {
                    $key = str_replace('mail.smtp', 'mail.mailers.smtp', $name);

                    $config->set($key, $value);
                }
            }

            $repo->set($settings);
        } catch (Exception $e) {
            //
        }
    }

    protected function loadSettings()
    {
        if ($this->app->runningInConsole()) {
            return Setting::all()->pluck('value', 'name')->all();
        }

        return Cache::remember('settings', now()->addDay(), function () {
            return Setting::all()->pluck('value', 'name')->all();
        });
    }
}
