<?php

namespace Azuriom\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;

/**
 * @property int $id
 * @property string $type
 * @property string $value
 * @property int $position
 * @property array|null $properties
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $title
 * @property string $color
 * @property string $icon
 */
class SocialLink extends Model
{
    public const CACHE_KEY = 'social_links';

    private const DEFAULT_VALUES = [
        'twitter' => [
            'title' => 'Twitter',
            'color' => '#1da1f2',
        ],
        'discord' => [
            'title' => 'Discord',
            'color' => '#5865f2',
        ],
        'youtube' => [
            'title' => 'YouTube',
            'color' => '#ff0000',
        ],
        'steam' => [
            'title' => 'Steam',
            'color' => '#111d2e',
        ],
        'instagram' => [
            'title' => 'Instagram',
            'color' => '#ff0076',
        ],
        'facebook' => [
            'title' => 'FaceBook',
            'color' => '#1877f2',
        ],
    ];

    protected static function booted()
    {
        foreach (['created', 'updated', 'deleted'] as $event) {
            static::registerModelEvent($event, fn () => static::clearCache());
        }
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type', 'value', 'position', 'properties', 'title', 'icon', 'color',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'properties' => 'array',
    ];

    public function getTitleAttribute()
    {
        $properties = $this->type === 'other'
            ? $this->properties
            : self::DEFAULT_VALUES[$this->type];

        return $properties['title'] ?? '';
    }

    public function setTitleAttribute($value)
    {
        $this->setProperty('title', $value);
    }

    public function getColorAttribute()
    {
        $properties = $this->type === 'other'
            ? $this->properties
            : self::DEFAULT_VALUES[$this->type];

        return $properties['color'] ?? '';
    }

    public function setColorAttribute($value)
    {
        $this->setProperty('color', $value);
    }

    public function getIconAttribute()
    {
        if ($this->type !== 'other') {
            return 'bi bi-'.$this->type;
        }

        return $this->properties['icon'] ?? '';
    }

    public function setIconAttribute($value)
    {
        $this->setProperty('icon', $value);
    }

    private function setProperty(string $key, ?string $value)
    {
        if ($this->type !== 'other') {
            $this->properties = null;

            return;
        }

        $properties = $this->properties ?? [];
        $properties[$key] = $value;
        $this->properties = $properties;
    }

    public static function clearCache()
    {
        Cache::forget(static::CACHE_KEY);
    }

    public static function types()
    {
        $values = Arr::pluck(self::DEFAULT_VALUES, 'title');

        return array_combine(array_keys(self::DEFAULT_VALUES), $values);
    }
}
