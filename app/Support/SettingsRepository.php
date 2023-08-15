<?php

namespace Azuriom\Support;

use Illuminate\Support\Collection;

class SettingsRepository
{
    protected Collection $settings;

    public function __construct(Collection $settings = null)
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

        foreach ($keys as $name => $val) {
            $this->settings->put($name, $val);
        }
    }
}
