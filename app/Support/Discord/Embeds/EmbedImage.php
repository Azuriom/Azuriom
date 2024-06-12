<?php

namespace Azuriom\Support\Discord\Embeds;

use Illuminate\Contracts\Support\Arrayable;

class EmbedImage implements Arrayable
{
    protected string $url;

    protected ?int $height = null;

    protected ?int $width = null;

    public function __construct(string $url, ?int $height = null, ?int $width = null)
    {
        $this->url = $url;
        $this->height = $height;
        $this->width = $width;
    }

    /**
     * {@inheritdoc}
     */
    public function toArray(): array
    {
        return [
            'url' => $this->url,
            'height' => $this->height,
            'width' => $this->width,
        ];
    }
}
