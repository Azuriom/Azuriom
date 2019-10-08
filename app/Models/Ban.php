<?php

namespace Azuriom\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property int $user_id
 * @property int $author_id
 * @property string $reason
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $removed_at
 *
 * @property \Azuriom\Models\User $user
 * @property \Azuriom\Models\User $author
 */
class Ban extends Model
{
    use SoftDeletes;

    protected const DELETED_AT = 'removed_at';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'author_id', 'reason',
    ];

    /**
     * Get the banned user
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the author of the ban
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
