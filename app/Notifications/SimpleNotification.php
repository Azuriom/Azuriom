<?php

namespace Azuriom\Notifications;

use Illuminate\Notifications\Notification;

class SimpleNotification extends Notification
{
    private $message;
    private $icon_read;
    private $icon_not_read;
    private $href;
    private $background;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(string $message = 'test notification', string $icon_read = 'far fa-envelope-open', string $icon_not_read = 'fa fa-envelope', string $href = '#', string $background = '')
    {
        $this->message = $message;
        $this->icon_read = $icon_read;
        $this->icon_not_read = $icon_not_read;
        $this->href = $href;
        $this->background = $background;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'message' => $this->message,
            'icon_read' => $this->icon_read,
            'icon_not_read' => $this->icon_not_read,
            'href' => $this->href,
            'background' => $this->background,
        ];
    }
}
