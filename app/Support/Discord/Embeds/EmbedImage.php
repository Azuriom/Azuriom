<?php

namespace Azuriom\Support\Discord\Embeds;

use Illuminate\Contracts\Support\Arrayable;

class EmbedImage implements Arrayable
{
    /**
     * Source URL of image (only supports http(s) and attachments).
     *
     * @var string
     */
    protected string $url;

    /**
     * Height of image.
     *
     * @var int|null
     */
    protected ?int $height = null;

    /**
     * Width of image.
     *
     * @var int|null
     */
    protected ?int $width = null;

    /**
     * Create a new image instance.
     *
     * @param  string  $url
     * @param  int|null  $height
     * @param  int|null  $width
     */
    public function __construct(string $url, int $height = null, int $width = null)
    {
        $this->url = $url;
        $this->height = $height;
        $this->width = $width;
    }

    /**
     * {@inheritdoc}
     */
    public function toArray()
    {
        return [
            'url' => $this->url,
            'height' => $this->height,
            'width' => $this->width,
        ];
    }
}
