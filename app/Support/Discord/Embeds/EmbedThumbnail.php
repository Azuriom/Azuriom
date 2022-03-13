<?php

namespace Azuriom\Support\Discord\Embeds;

use Illuminate\Contracts\Support\Arrayable;

class EmbedThumbnail implements Arrayable
{
    /**
     * Source url of thumbnail (only supports http(s) and attachments).
     *
     * @var string
     */
    protected string $url;

    /**
     * Create a new thumbnail instance.
     *
     * @param  string  $url
     */
    public function __construct(string $url)
    {
        $this->url = $url;
    }

    /**
     * {@inheritdoc}
     */
    public function toArray()
    {
        return [
            'url' => $this->url,
        ];
    }
}
