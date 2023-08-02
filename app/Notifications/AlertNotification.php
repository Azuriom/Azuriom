<?php

namespace Azuriom\Notifications;

use Azuriom\Models\User;
use Illuminate\Contracts\Support\Arrayable;

class AlertNotification implements Arrayable
{
    /**
     * The notification's level.
     */
    protected string $level = 'info';

    /**
     * The notification's content.
     */
    protected string $content;

    /**
     * The notification's link.
     */
    protected ?string $link = null;

    /**
     * The notification's from user.
     */
    protected ?User $from = null;

    /**
     * Create a new notification instance.
     */
    public function __construct(string $content)
    {
        $this->content = $content;
    }

    public function level(string $level): self
    {
        $this->level = $level;

        return $this;
    }

    public function link(string $link): self
    {
        $this->link = $link;

        return $this;
    }

    public function from(User $from): self
    {
        $this->from = $from;

        return $this;
    }

    public function send(User $user): void
    {
        $user->notifications()->create($this->toArray());
    }

    public function toArray(): array
    {
        return [
            'level' => $this->level,
            'content' => $this->content,
            'author_id' => $this->from?->id,
            'link' => $this->link,
        ];
    }
}
