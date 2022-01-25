<?php

namespace Azuriom\Models;

use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

/**
 * @property int $id
 * @property string $name
 * @property string $value
 */
class Setting extends Model
{
    /**
     * The settings that are encrypted for storage.
     *
     * @var string[]
     */
    private const ENCRYPTED = [
        'mail.smtp.password',
    ];

    /**
     * The settings that are encoded in JSON for storage.
     *
     * @var string[]
     */
    private const JSON_ENCODED = [
        'maintenance-paths',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'value',
    ];

    public function getValueAttribute(string $value)
    {
        if ($value === null) {
            return null;
        }

        if (in_array($this->name, self::ENCRYPTED, true)) {
            try {
                return decrypt($value, false);
            } catch (DecryptException $e) {
                return null;
            }
        }

        if (in_array($this->name, self::JSON_ENCODED, true)) {
            $decoded = json_decode($value, true);

            return json_last_error() === JSON_ERROR_NONE ? $decoded : null;
        }

        return $value;
    }

    public function setValueAttribute($value)
    {
        if ($value === null) {
            $this->attributes['value'] = null;

            return;
        }

        if (in_array($this->name, self::ENCRYPTED, true)) {
            $this->attributes['value'] = encrypt($value, false);

            return;
        }

        if (in_array($this->name, self::JSON_ENCODED, true)) {
            $this->attributes['value'] = $value;

            return;
        }

        $this->attributes['value'] = $value;
    }

    /**
     * Set a given settings values.
     *
     * @param  array|string  $key
     * @param  mixed  $value
     * @return void
     */
    public static function updateSettings($key, $value = null)
    {
        $keys = is_array($key) ? $key : [$key => $value];

        foreach ($keys as $key => $value) {
            if ($value !== null) {
                self::updateOrCreate(['name' => $key], ['value' => $value]);
            } else {
                self::where('name', $key)->delete();
            }

            setting()->set($key, $value);
        }

        Cache::forget('settings');
    }
}
