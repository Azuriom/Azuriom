<?php

namespace Azuriom\Support;

use Illuminate\Support\Collection;

class SettingsRepository
{
    /**
     * All the settings.
     *
     * @var \Illuminate\Support\Collection
     */
    protected Collection $settings;

    /**
     * Create a repository instance.
     *
     * @param  \Illuminate\Support\Collection|null  $settings
     */
    public function __construct(Collection $settings = null)
    {
        $this->settings = $settings ?? collect();
    }

    /**
     * Determine if the given settings exists.
     *
     * @param  string  $key
     * @return bool
     */
    public function has(string $key)
    {
        return $this->settings->has($key);
    }

    /**
     * Get the specified settings.
     *
     * @param  string  $key
     * @param  mixed|null  $default
     * @return mixed
     */
    public function get(string $key, mixed $default = null)
    {
        return $this->settings->get($key, $default);
    }

    /**
     * Set a given configuration value.
     *
     * @param  array|string  $key
     * @param  mixed|null  $value
     * @return void
     */
    public function set(array|string $key, mixed $value = null)
    {
        $keys = is_array($key) ? $key : [$key => $value];

        foreach ($keys as $name => $val) {
            $this->settings->put($name, $val);
        }
    }
}
