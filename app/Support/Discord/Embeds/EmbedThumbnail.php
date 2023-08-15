<?php

namespace Azuriom\Support\Discord\Embeds;

use Illuminate\Contracts\Support\Arrayable;

class EmbedThumbnail implements Arrayable
{
    protected string $url;

    public function __construct(string $url)
    {
        $this->url = $url;
    }

    /**
     * {@inheritdoc}
     */
    public function toArray(): array
    {
        return [
            'url' => $this->url,
        ];
    }
}
