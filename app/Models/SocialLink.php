<?php

namespace Azuriom\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Casts\Json;
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
            'icon' => 'bi bi-twitter',
        ],
        'discord' => [
            'title' => 'Discord',
            'color' => '#5865f2',
            'icon' => 'bi bi-discord',
        ],
        'youtube' => [
            'title' => 'YouTube',
            'color' => '#ff0000',
            'icon' => 'bi bi-youtube',
        ],
        'steam' => [
            'title' => 'Steam',
            'color' => '#111d2e',
            'icon' => 'bi bi-steam',
        ],
        'instagram' => [
            'title' => 'Instagram',
            'color' => '#ff0076',
            'icon' => 'bi bi-instagram',
        ],
        'facebook' => [
            'title' => 'FaceBook',
            'color' => '#1877f2',
            'icon' => 'bi bi-facebook',
        ],
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'type', 'value', 'position', 'properties', 'title', 'icon', 'color',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'properties' => 'array',
    ];

    protected static function booted(): void
    {
        foreach (['created', 'updated', 'deleted'] as $event) {
            static::registerModelEvent($event, fn () => static::clearCache());
        }
    }

    /**
     * Interact with the link's title.
     */
    protected function title(): Attribute
    {
        return Attribute::make(
            get: fn ($val, array $attr) => $this->getProperty('title', $attr),
            set: fn (?string $value) => $this->withProperty('title', $value),
        );
    }

    /**
     * Interact with the link's color.
     */
    protected function color(): Attribute
    {
        return Attribute::make(
            get: fn ($val, array $attr) => $this->getProperty('color', $attr),
            set: fn (?string $value) => $this->withProperty('color', $value),
        );
    }

    /**
     * Interact with the link's icon.
     */
    protected function icon(): Attribute
    {
        return Attribute::make(
            get: fn ($val, array $attr) => $this->getProperty('icon', $attr),
            set: fn (?string $value) => $this->withProperty('icon', $value),
        );
    }

    private function getProperty(string $key): string
    {
        $properties = $this->type === 'other'
            ? $this->properties
            : self::DEFAULT_VALUES[$this->type];

        return $properties[$key] ?? '';
    }

    private function withProperty(string $key, ?string $value): array
    {
        if ($this->type !== 'other') {
            return [];
        }

        $properties = $this->properties ?? [];
        $properties[$key] = $value;

        return ['properties' => Json::encode($properties)];
    }

    public static function clearCache(): void
    {
        Cache::forget(static::CACHE_KEY);
    }

    public static function types(): array
    {
        $values = Arr::pluck(self::DEFAULT_VALUES, 'title');

        return array_combine(array_keys(self::DEFAULT_VALUES), $values);
    }
}
