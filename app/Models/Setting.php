<?php

namespace Azuriom\Models;

use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use JsonException;

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
    private static array $encrypted = [
        'mail.smtp.password',
    ];

    /**
     * The settings that are encoded in JSON for storage.
     *
     * @var string[]
     */
    private static array $jsonEncoded = [
        'maintenance.paths',
        'themes.config.*',
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
     * @var array<int, string>
     */
    protected $fillable = [
        'name', 'value',
    ];

    public function getValueAttribute(?string $value): mixed
    {
        if ($value === null) {
            return null;
        }

        if (Str::is(self::$encrypted, $this->name)) {
            try {
                return decrypt($value, false);
            } catch (DecryptException) {
                return null;
            }
        }

        if (Str::is(self::$jsonEncoded, $this->name)) {
            try {
                return json_decode($value, true, flags: JSON_THROW_ON_ERROR);
            } catch (JsonException) {
                return null;
            }
        }

        return $value;
    }

    public function setValueAttribute(mixed $value)
    {
        if ($value === null) {
            $this->attributes['value'] = null;

            return;
        }

        if (Str::is(self::$encrypted, $this->name)) {
            $this->attributes['value'] = encrypt($value, false);

            return;
        }

        if (Str::is(self::$jsonEncoded, $this->name)) {
            $this->attributes['value'] = json_encode($value);

            return;
        }

        $this->attributes['value'] = $value;
    }

    /**
     * Modify a given settings values and return the previous values.
     */
    public static function updateSettings(string|array $key, mixed $value = null): array
    {
        $keys = is_array($key) ? $key : [$key => $value];
        $old = collect($keys)->mapWithKeys(fn ($value, $name) => [
            $name => setting($name),
        ])->all();

        foreach ($keys as $name => $val) {
            if ($val !== null) {
                self::updateOrCreate(['name' => $name], ['value' => $val]);
            } else {
                self::where('name', $name)->delete();
            }

            setting()->set($name, $val);
        }

        Cache::forget('settings');

        return $old;
    }
}
