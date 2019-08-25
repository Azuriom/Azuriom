<?php

namespace Azuriom\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'file', 'type'
    ];

    /**
     * Get the slug of this image.
     */
    public function getSlug()
    {
        return pathinfo($this->file, PATHINFO_FILENAME);
    }

    public function getExtension()
    {
        return pathinfo($this->file, PATHINFO_EXTENSION);
    }
}
