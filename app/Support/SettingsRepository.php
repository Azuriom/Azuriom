<?php

namespace Azuriom\Support;

use Illuminate\Config\Repository as Config;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class SettingsRepository
{
    protected Collection $settings;

    public function __construct(?Collection $settings = null)
    {
        $this->settings = $settings ?? collect();
    }

    /**
     * Determine if the given settings exists.
     */
    public function has(string $key): bool
    {
        return $this->settings->has($key);
    }

    /**
     * Get the specified settings.
     */
    public function get(string $key, mixed $default = null): mixed
    {
        return $this->settings->get($key, $default);
    }

    /**
     * Set a given configuration value.
     */
    public function set(array|string $key, mixed $value = null): void
    {
        $keys = is_array($key) ? $key : [$key => $value];
        $config = config();

        foreach ($keys as $name => $val) {
            $this->settings->put($name, $val);

            $this->updateConfig($config, $name, $val);
        }
    }

    protected function updateConfig(Config $config, string $name, mixed $value): void
    {
        switch ($name) {
            case 'name':
                $config->set('mail.from.name', $value);
                break;
            case 'locale':
                app()->setLocale(str_replace('-', '_', $value));
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
