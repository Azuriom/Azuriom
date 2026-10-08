<?php

namespace Azuriom\Models\Traits;

use Illuminate\Contracts\Filesystem\Filesystem;
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
        static::deleted(function (self $model) {
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

    /**
     * Get the image srcset (if available).
     */
    public function imageSrcset(): ?string
    {
        $image = $this->getAttribute($this->getImageKey());

        if ($image === null) {
            return null;
        }

        $sizes = $this->getImageSizes();

        if (empty($sizes)) {
            return null;
        }

        $disk = $this->getImageDisk();
        $srcset = [];

        foreach ($sizes as $size) {
            $variant = $this->resolveImagePath($this->getImageVariantName($image, $size));

            if ($disk->exists($variant)) {
                $srcset[] = url($disk->url($variant))." {$size}w";
            }
        }

        return empty($srcset) ? null : implode(', ', $srcset);
    }

    protected function resolveImagePath(string $path = ''): string
    {
        return ($this->imagePath ?? Str::snake(Str::pluralStudly(class_basename($this)))).'/'.$path;
    }

    protected function getImageSizes(): array
    {
        $sizes = property_exists($this, 'imageSizes') ? (array) $this->imageSizes : [];
        $sizes = array_filter($sizes, fn ($size) => is_int($size) && $size > 0);
        $sizes = array_values(array_unique($sizes));
        sort($sizes);

        return $sizes;
    }

    protected function getImageVariantName(string $filename, int $size): string
    {
        $name = pathinfo($filename, PATHINFO_FILENAME);
        $extension = pathinfo($filename, PATHINFO_EXTENSION);

        return $name.'-'.$size.'w.'.$extension;
    }

    protected function generateImageVariants(UploadedFile $file, string $filename): void
    {
        $sizes = $this->getImageSizes();

        if (empty($sizes)) {
            return;
        }

        foreach ($sizes as $size) {
            $this->generateImageVariant($file->getPathname(), $filename, $size);
        }
    }

    /**
     * Generate a single image variant at the specified size.
     */
    protected function generateImageVariant(string $filePath, string $filename, int $size): void
    {
        $image = imagecreatefromstring(file_get_contents($filePath));

        if ($image === false) {
            return;
        }

        $originalWidth = imagesx($image);
        $originalHeight = imagesy($image);

        // Calculate new dimensions maintaining aspect ratio
        $ratio = $originalHeight / $originalWidth;
        $newWidth = $size;
        $newHeight = (int) ($size * $ratio);

        // Create resized image
        $resized = imagecreatetruecolor($newWidth, $newHeight);

        if ($resized === false) {
            imagedestroy($image);

            return;
        }

        // Preserve transparency for PNG
        imagealphablending($resized, false);
        imagesavealpha($resized, true);

        imagecopyresampled($resized, $image, 0, 0, 0, 0, $newWidth, $newHeight, $originalWidth, $originalHeight);

        // Save variant
        ob_start();
        imagejpeg($resized, null, 85);
        $imageContent = ob_get_clean();

        $variantPath = $this->resolveImagePath($this->getImageVariantName($filename, $size));
        $this->getImageDisk()->put($variantPath, $imageContent);

        imagedestroy($image);
        imagedestroy($resized);
    }

    protected function deleteImageVariants(string $filename): void
    {
        $sizes = $this->getImageSizes();

        if (empty($sizes)) {
            return;
        }

        $disk = $this->getImageDisk();

        foreach ($sizes as $size) {
            $disk->delete($this->resolveImagePath($this->getImageVariantName($filename, $size)));
        }
    }
}
