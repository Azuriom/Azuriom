<?php

namespace Azuriom\Notifications;

use Azuriom\Models\User;
use Illuminate\Contracts\Support\Arrayable;

class AlertNotification implements Arrayable
{
    /**
     * The notification's level.
     *
     * @var string
     */
    protected string $level = 'info';

    /**
     * The notification's content.
     *
     * @var string
     */
    protected string $content;

    /**
     * The notification's link.
     *
     * @var string|null
     */
    protected ?string $link = null;

    /**
     * The notification's from user.
     *
     * @var \Azuriom\Models\User|null
     */
    protected ?User $from = null;

    /**
     * Create a new notification instance.
     *
     * @param  string  $content
     */
    public function __construct(string $content)
    {
        $this->content = $content;
    }

    public function level(string $level)
    {
        $this->level = $level;

        return $this;
    }

    public function link(string $link)
    {
        $this->link = $link;

        return $this;
    }

    public function from(User $from)
    {
        $this->from = $from;

        return $this;
    }

    public function send(User $user)
    {
        $user->notifications()->create($this->toArray());
    }

    public function toArray()
    {
        return [
            'level' => $this->level,
            'content' => $this->content,
            'author_id' => $this->from?->id,
            'link' => $this->link,
        ];
    }
}
