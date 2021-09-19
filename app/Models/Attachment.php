<?php

namespace Azuriom\Models;

use Azuriom\Models\Traits\HasImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property string $attachable_type
 * @property int $attachable_id
 * @property string $file
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon|null $deleted_at
 * @property \Illuminate\Database\Eloquent\Model|\Azuriom\Models\Traits\Attachable $attachable
 */
class Attachment extends Model
{
    use HasImage;
    use SoftDeletes;

    protected $imageKey = 'file';

    public function attachable()
    {
        return $this->morphTo('attachable');
    }

    protected function resolveImagePath(string $path = '')
    {
        return $this->attachable->getAttachmentsPath().'/'.$path;
    }
}
