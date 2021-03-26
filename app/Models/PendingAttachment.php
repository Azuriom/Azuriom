<?php

namespace Azuriom\Models;

use Azuriom\Models\Traits\HasImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

/**
 * @property int $id
 * @property string $pending_id
 * @property string $pending_type
 * @property string $file
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class PendingAttachment extends Model
{
    use HasImage;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pending_id', 'pending_type',
    ];

    protected $imageKey = 'file';

    protected function resolveImagePath(string $path = '')
    {
        $type = Relation::getMorphedModel($this->pending_type) ?? $this->pending_type;

        return (new $type())->getAttachmentsPath().'/'.$path;
    }
}
