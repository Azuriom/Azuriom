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
        if (! is_installed()) {
            return;
        }

        $repo = $this->app->make(SettingsRepository::class);

        try {
            $settings = $this->decryptSettings($this->loadSettings());

            foreach ($settings as $name => $value) {
                $this->handleSpecialSettings($config, $name, $value);
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

    protected function decryptSettings(array $settings)
    {
        foreach ($this->encrypted as $key) {
            $value = $settings[$key] ?? null;

            if ($value === null) {
                continue;
            }

            try {
                $settings[$key] = decrypt($value, false);
            } catch (DecryptException $e) {
                $settings[$key] = null;
            }
        }

        return $settings;
    }

    protected function handleSpecialSettings(Config $config, string $name, $value)
    {
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

        if (Str::startsWith($name, 'mail.')) {
            $key = str_replace('mail.smtp', 'mail.mailers.smtp', $name);

            $config->set($key, $value);
        }
    }
}
