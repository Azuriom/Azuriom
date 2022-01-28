<?php

namespace Azuriom\Models\Traits;

use Azuriom\Models\Attachment;
use Azuriom\Models\PendingAttachment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

/**
 * @property \Illuminate\Support\Collection|\Azuriom\Models\Attachment[] $attachments
 */
trait Attachable
{
    public static function bootAttachable()
    {
        static::updated(function (Model $model) {
            $content = $model->getAttribute($model->getAttachmentsKey());

            if ($model->getOriginal($model->getAttachmentsKey()) === $content) {
                return;
            }

            $attachments = $model->attachments()->withTrashed()->get();

            foreach ($attachments as $attachment) {
                if (Str::contains($content, $attachment->file)) {
                    if ($attachment->trashed()) {
                        $attachment->restore();
                    }
                } elseif (! $attachment->trashed()) {
                    $attachment->delete();
                }
            }
        });
    }

    public static function storePendingAttachment(string $pendingId, UploadedFile $file)
    {
        $attachment = new PendingAttachment([
            'pending_id' => $pendingId,
            'pending_type' => (new self())->getAttachmentsType(),
        ]);

        return $attachment->storeImage($file, true);
    }

    public function persistPendingAttachments(?string $pendingId)
    {
        if ($pendingId === null) {
            return;
        }

        $attachments = PendingAttachment::where('pending_id', $pendingId)
            ->where('pending_type', $this->getAttachmentsType())
            ->get();

        $content = $this->getAttribute($this->getAttachmentsKey());

        foreach ($attachments as $attachment) {
            if (Str::contains($content, $attachment->file)) {
                $this->attachments()
                    ->make()
                    ->forceFill(['file' => $attachment->file])
                    ->save();

                // We don't want to delete the file since now a permanent attachment use it
                $attachment->forceFill(['file' => null]);
            }

            // Delete the pending attachment, and the file if it was not used
            $attachment->delete();
        }
    }

    public function storeAttachment(UploadedFile $file)
    {
        /** @var \Azuriom\Models\Attachment $attachment */
        $attachment = $this->attachments()->make();

        return $attachment->storeImage($file, true);
    }

    public function attachments()
    {
        return $this->morphMany(Attachment::class, 'attachable');
    }

    public function getAttachmentsKey()
    {
        return 'content';
    }

    public function getAttachmentsType()
    {
        return (new self())->getMorphClass();
    }

    public function getAttachmentsPath()
    {
        return Str::replace('_', '/', $this->getTable()).'/attachments';
    }
}
