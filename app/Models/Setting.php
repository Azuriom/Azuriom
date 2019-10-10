<?php

namespace Azuriom\Models;

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
                Setting::updateOrCreate(['name' => $key], ['value' => $value]);
            } else {
                Setting::where('name', $key)->delete();
            }
        }

        Cache::forget('settings');
    }
}
