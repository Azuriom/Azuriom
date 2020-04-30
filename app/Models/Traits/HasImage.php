<?php

namespace Azuriom\Models\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * Trait to link an image to a model.
 */
trait HasImage
{
    protected static function bootHasImage()
    {
        static::deleting(function (Model $model) {
            if (! ($model->forceDeleting ?? true)) {
                return;
            }

            $model->deleteImage();
        });
    }

    /**
     * Store the image and associate it with this model.
     *
     * @param  \Illuminate\Http\UploadedFile  $file
     */
    public function storeImage(UploadedFile $file)
    {
        $this->deleteImage();

        $path = basename($file->storePublicly($this->getImagePath(), 'public'));

        $this->setAttribute($this->getImageKey(), $path);
    }

    /**
     * Delete the image associated with this model.
     *
     * @return void
     */
    public function deleteImage()
    {
        $key = $this->getImageKey();
        $image = $this->getAttribute($key);

        if ($image !== null) {
            Storage::disk('public')->delete($this->getImagePath($image));

            $this->setAttribute($key, null);
        }
    }

    /**
     * Get this post image url.
     *
     * @return string|null
     */
    public function imageUrl()
    {
        $image = $this->getAttribute($this->getImageKey());

        if ($image === null) {
            return null;
        }

        return Storage::disk()->url($this->getImagePath($image));
    }

    /**
     * Return true if this this model has an image.
     *
     * @return bool
     */
    public function hasImage()
    {
        return $this->image !== null;
    }

    protected function getImageKey()
    {
        return $this->imageKey ?? 'image';
    }

    protected function getImagePath(string $path = '')
    {
        return ($this->imagePath ?? Str::snake(Str::pluralStudly(class_basename($this)))).'/'.$path;
    }
}
