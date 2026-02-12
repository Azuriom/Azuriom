<?php

namespace Azuriom\Models;

use Azuriom\Models\Traits\Attachable;
use Azuriom\Models\Traits\Loggable;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $slug
 * @property string $content
 * @property bool $is_enabled
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \Illuminate\Support\Collection|\Azuriom\Models\Role[] $roles
 *
 * @method static \Illuminate\Database\Eloquent\Builder enabled()
 */
class Page extends Model
{
    use Attachable;
    use Loggable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title', 'description', 'slug', 'content', 'is_enabled',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_enabled' => 'boolean',
    ];

    /**
     * Get roles allowed to access this page.
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function isRestricted(): bool
    {
        return ! $this->roles->isEmpty();
    }

    /**
     * Scope a query to only include enabled pages.
     */
    #[Scope]
    protected function enabled(Builder $query): void
    {
        $query->where('is_enabled', true);
    }
}
