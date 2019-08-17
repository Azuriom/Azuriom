<?php

namespace App\Models;

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

    public function getSlug()
    {
        return pathinfo($this->file, PATHINFO_FILENAME);
    }

    public function getExtension()
    {
        return pathinfo($this->file, PATHINFO_EXTENSION);
    }
}
