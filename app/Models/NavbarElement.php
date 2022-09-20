<?php

namespace Azuriom\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Str;

/**
 * @property int $id
 * @property string $name
 * @property string|null $icon
 * @property string $value
 * @property int $position
 * @property string $type
 * @property int|null $parent_id
 * @property bool $new_tab
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \Azuriom\Models\NavbarElement|null $parent
 * @property \Illuminate\Support\Collection|\Azuriom\Models\NavbarElement[] $elements
 * @property \Illuminate\Support\Collection|\Azuriom\Models\Role[] $roles
 */
class NavbarElement extends Model
{
    public const CACHE_KEY = 'navbar';

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
        'name', 'icon', 'value', 'position', 'type', 'parent_id', 'new_tab',
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
            static::registerModelEvent($event, fn () => static::clearCache());
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

    /**
     * Get roles attached to this navbar element.
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function getLink()
    {
        return match ($this->type) {
            'home' => route('home'),
            'link' => $this->value,
            'page' => route('pages.show', $this->value),
            'post' => route('posts.show', $this->value),
            'posts' => route('posts.index'),
            'plugin' => Route::has($this->value) ? route($this->value) : '#',
            default => '#',
        };
    }

    public function isCurrent()
    {
        $request = request();

        return match ($this->type) {
            'home' => $request->routeIs('home'),
            'link' => $request->is($this->value),
            'page' => $request->routeIs('pages.show') && $request->route('path') === $this->value,
            'post' => $request->routeIs('posts.show') && $request->route('post.slug') === $this->value,
            'posts' => $request->routeIs('posts.*'),
            'plugin' => $request->routeIs(Str::beforeLast($this->value, '.').'.*'),
            'dropdown' => $this->elements
                ->contains(
                    fn (self $element) => ! $element->isDropdown() && $element->isCurrent()
                ),
            default => false,
        };
    }

    public function getNameAttribute($value)
    {
        if ($value instanceof HtmlString) {
            return $value;
        }

        $icon = $this->icon !== null ? '<i class="'.$this->icon.'"></i> ' : '';

        return new HtmlString($icon.e($value));
    }

    public function getRawNameAttribute()
    {
        return $this->getRawOriginal('name');
    }

    public function getTypeValue(string $type)
    {
        return $this->type === $type ? $this->value : '';
    }

    public function isDropdown()
    {
        return $this->type === 'dropdown';
    }

    public function isRestricted()
    {
        return ! $this->roles->isEmpty();
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
        Cache::forget(static::CACHE_KEY);
    }

    /**
     * Test if the current user has the permission to see this element.
     *
     * @return bool
     */
    public function hasPermission()
    {
        if (! $this->isRestricted()) {
            return true;
        }

        if (Auth::guest()) {
            return false;
        }

        /** @var \Azuriom\Models\User $user */
        $user = Auth::user();

        return $user->isAdmin() || $this->roles->contains($user->role);
    }
}
