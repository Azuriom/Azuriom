<?php

namespace Azuriom\Support\Discord\Embeds;

use Illuminate\Contracts\Support\Arrayable;

class EmbedFooter implements Arrayable
{
    /**
     * Footer text.
     *
     * @var string
     */
    protected $text;

    /**
     * URL of footer icon (only supports http(s) and attachments).
     *
     * @var string|null
     */
    protected $iconUrl;

    /**
     * Create a new footer instance.
     *
     * @param  string  $text
     * @param  string|null  $iconUrl
     */
    public function __construct(string $text, string $iconUrl = null)
    {
        $this->text = $text;
        $this->iconUrl = $iconUrl;
    }

    /**
     * {@inheritdoc}
     */
    public function toArray()
    {
        return [
            'text' => $this->text,
            'icon_url' => $this->iconUrl,
        ];
    }
}
