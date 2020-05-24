<?php

namespace Azuriom\Support;

use Illuminate\Support\Collection;

class SettingsRepository
{
    /**
     * All of the settings.
     *
     * @var \Illuminate\Support\Collection
     */
    protected $settings;

    /**
     * Create a repository instance.
     *
     * @param  \Illuminate\Support\Collection  $settings
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
    public function has($key)
    {
        return $this->settings->has($key);
    }

    /**
     * Get the specified settings.
     *
     * @param  array|string  $key
     * @param  mixed  $default
     * @return mixed
     */
    public function get($key, $default = null)
    {
        return $this->settings->get($key, $default);
    }

    /**
     * Set a given configuration value.
     *
     * @param  array|string  $key
     * @param  mixed  $value
     * @return void
     */
    public function set($key, $value = null)
    {
        $keys = is_array($key) ? $key : [$key => $value];

        foreach ($keys as $key => $value) {
            $this->settings->put($key, $value);
        }
    }
}
