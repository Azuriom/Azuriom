<?php

namespace Azuriom\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

/**
 * @property int $id
 * @property string $name
 * @property string $value
 * @property int $position
 * @property string $type
 * @property int|null $parent_id
 * @property bool $new_tab
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @property \Azuriom\Models\NavbarElement|null $parent
 * @property \Illuminate\Support\Collection|\Azuriom\Models\NavbarElement[] $elements
 */
class NavbarElement extends Model
{
    /**
     * The navbar elements types.
     *
     * @var array
     */
    private const TYPES = [
        'home', 'link', 'page', 'post', 'posts', 'plugin', 'dropdown',
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
        'name', 'value', 'position', 'type', 'parent_id', 'new_tab',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'new_tab' => 'boolean',
    ];

    protected static function booted()
    {
        foreach (['created', 'updated', 'deleted'] as $event) {
            static::registerModelEvent($event, function () {
                static::clearCache();
            });
        }
    }

    /**
     * Get the parent element of this element.
     */
    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    /**
     * Get the child elements if this element is a dropdown.
     */
    public function elements()
    {
        return $this->hasMany(self::class, 'parent_id')->orderBy('position');
    }

    public function getLink()
    {
        switch ($this->type) {
            case 'home':
                return route('home');
            case 'link':
                return $this->value;
            case 'page':
                return route('pages.show', $this->value);
            case 'post':
                return route('posts.show', $this->value);
            case 'posts':
                return route('posts.index');
            case 'plugin':
                return Route::has($this->value) ? route($this->value) : '#';
            default:
                return '#';
        }
    }

    public function isCurrent()
    {
        $request = request();

        switch ($this->type) {
            case 'home':
                return $request->routeIs('home');
            case 'link':
                return $request->is($this->value);
            case 'page':
                return $request->routeIs('pages.show') && $request->route('page.slug') === $this->value;
            case 'post':
                return $request->routeIs('posts.show') && $request->route('post.slug') === $this->value;
            case 'posts':
                return $request->routeIs('posts.*');
            case 'plugin':
                return $request->routeIs(Str::beforeLast($this->value, '.').'.*');
            case 'dropdown':
                return $this->elements
                    ->contains(function (self $element) {
                        return ! $element->isDropdown() && $element->isCurrent();
                    });
            default:
                return false;
        }
    }

    public function getTypeValue(string $type)
    {
        return $this->type === $type ? $this->value : '';
    }

    public function isDropdown()
    {
        return $this->type === 'dropdown';
    }

    public function hasParent()
    {
        return $this->parent_id !== null;
    }

    /**
     * Scope a query to only include elements without parent.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeParent(Builder $query)
    {
        return $query->whereNull('parent_id');
    }

    public static function types()
    {
        return self::TYPES;
    }

    /**
     * Clear the navbar elements cache.
     *
     * @return void
     */
    public static function clearCache()
    {
        Cache::forget('navbar_elements');
    }
}
