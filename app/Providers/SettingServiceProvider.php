<?php

namespace Azuriom\Providers;

use Azuriom\Models\Setting;
use Exception;
use Illuminate\Cache\Repository as Cache;
use Illuminate\Config\Repository as Config;
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
        'mail.password',
    ];

    /**
     * Bootstrap services.
     *
     * @param  \Illuminate\Cache\Repository  $cache
     * @param  \Illuminate\Config\Repository  $config
     * @return void
     */
    public function boot(Cache $cache, Config $config)
    {
        try {
            $settings = $cache->remember('settings', now()->addDay(), function () {
                return Setting::all()->pluck('value', 'name')->all();
            });

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
                        if ($value === 'argon2id' && ! defined('PASSWORD_ARGON2ID')) {
                            $value = 'argon';
                        }

                        if ($config->get('hashing.driver') !== $value) {
                            $config->set('hashing.driver', $value);
                        }
                        break;
                }

                if (in_array($name, $this->encrypted, true)) {
                    $value = decrypt($value, false);
                }

                if (Str::startsWith($name, 'mail.')) {
                    $config->set($name, $value);
                }

                $config->set('setting.'.$name, $value);
            }
        } catch (Exception $e) {
            //
        }
    }
}
