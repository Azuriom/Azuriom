<?php

namespace Azuriom\Models\Traits;

use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * Trait to link an image to a model.
 */
trait HasImage
{
    protected string $imageDisk = 'public';

    protected static function bootHasImage(): void
    {
        static::deleted(function (Model $model) {
            if (method_exists($model, 'isForceDeleting') && ! $model->isForceDeleting()) {
                return;
            }

            $model->deleteImage();
        });
    }

    /**
     * Store the image and associate it with this model.
     */
    public function storeImage(UploadedFile $file, bool $save = false): string
    {
        $this->deleteImage();

        $path = basename($file->storePublicly($this->resolveImagePath(), $this->imageDisk));

        $this->setAttribute($this->getImageKey(), $path);

        if ($save) {
            $this->save();
        }

        return $this->imageUrl();
    }

    /**
     * Delete the image associated with this model.
     */
    public function deleteImage(bool $save = false): bool
    {
        $key = $this->getImageKey();
        $image = $this->getAttribute($key);

        if ($image === null) {
            return false;
        }

        if (! $this->getImageDisk()->delete($this->resolveImagePath($image))) {
            return false;
        }

        $this->setAttribute($key, null);

        if ($save) {
            $this->save();
        }

        return true;
    }

    /**
     * Return true if this model has an image.
     */
    public function hasImage(): bool
    {
        return $this->getAttribute($this->getImageKey()) !== null;
    }

    /**
     * Get this post image url.
     */
    public function imageUrl(): ?string
    {
        $image = $this->getAttribute($this->getImageKey());

        if ($image === null) {
            return null;
        }

        return url($this->getImageDisk()->url($this->resolveImagePath($image)));
    }

    /**
     * Get this post image path.
     */
    public function getImagePath(): ?string
    {
        $image = $this->getAttribute($this->getImageKey());

        if ($image === null) {
            return null;
        }

        return $this->resolveImagePath($image);
    }

    public function getImageDisk(): Filesystem
    {
        return Storage::disk($this->imageDisk);
    }

    protected function getImageKey(): string
    {
        return $this->imageKey ?? 'image';
    }

    protected function resolveImagePath(string $path = ''): string
    {
        return ($this->imagePath ?? Str::snake(Str::pluralStudly(class_basename($this)))).'/'.$path;
    }
}
