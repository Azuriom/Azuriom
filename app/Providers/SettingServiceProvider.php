<?php

namespace Azuriom\Providers;

use Azuriom\Models\Setting;
use Exception;
use Illuminate\Cache\Repository as Cache;
use Illuminate\Config\Repository as Config;
use Illuminate\Support\ServiceProvider;

class SettingServiceProvider extends ServiceProvider
{
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
                return Setting::all()->pluck('value', 'name')->toArray();
            });

            foreach ($settings as $name => $value) {
                switch ($name) {
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

                $config->set('setting.'.$name, $value);
            }

            $theme = setting('theme');

            if ($theme !== null) {
                $finder = $this->app['view']->getFinder();
                $finder->prependLocation(theme_path($theme));
            }
        } catch (Exception $e) {
            //
        }
    }
}
