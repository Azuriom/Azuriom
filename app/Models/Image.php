<?php

namespace Azuriom\Models;

use Azuriom\Models\Traits\Loggable;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $file
 * @property string $type
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class Image extends Model
{
    use Loggable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', 'file', 'type',
    ];

    /**
     * Get the slug of this image.
     */
    public function getSlug(): string
    {
        return pathinfo($this->file, PATHINFO_FILENAME);
    }

    public function getExtension(): string
    {
        return pathinfo($this->file, PATHINFO_EXTENSION);
    }

    public function url(): string
    {
        return image_url($this->file);
    }
}
