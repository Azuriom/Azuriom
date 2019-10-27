<?php

namespace Azuriom\Models;

use Azuriom\Models\Traits\HasUser;
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
    use HasUser, SoftDeletes;

    protected const DELETED_AT = 'removed_at';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'author_id', 'reason',
    ];

    /**
     * The user key associated with this model.
     *
     * @var string
     */
    protected $userKey = 'author_id';

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
