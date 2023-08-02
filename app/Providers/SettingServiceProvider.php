<?php

namespace Azuriom\Providers;

use Azuriom\Models\Setting;
use Azuriom\Support\SettingsRepository;
use Exception;
use Illuminate\Config\Repository as Config;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class SettingServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(SettingsRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function boot(Config $config): void
    {
        if (! is_installed()) {
            return;
        }

        $repo = $this->app->make(SettingsRepository::class);

        try {
            $settings = $this->loadSettings();

            foreach ($settings as $name => $value) {
                $this->handleSpecialSettings($config, $name, $value);
            }

            $repo->set($settings);
        } catch (Exception) {
            //
        }
    }

    protected function loadSettings(): array
    {
        if ($this->app->runningInConsole()) {
            return Setting::all()->pluck('value', 'name')->all();
        }

        return Cache::remember('settings', now()->addDay(), function () {
            return Setting::all()->pluck('value', 'name')->all();
        });
    }

    protected function handleSpecialSettings(Config $config, string $name, $value): void
    {
        switch ($name) {
            case 'name':
                $config->set('mail.from.name', $value);
                break;
            case 'locale':
                $this->app->setLocale(str_replace('-', '_', $value));
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
