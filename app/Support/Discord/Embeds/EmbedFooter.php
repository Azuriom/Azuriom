<?php

namespace Azuriom\Support\Discord\Embeds;

use Illuminate\Contracts\Support\Arrayable;

class EmbedFooter implements Arrayable
{
    protected string $text;

    protected ?string $iconUrl = null;

    public function __construct(string $text, string $iconUrl = null)
    {
        $this->text = $text;
        $this->iconUrl = $iconUrl;
    }

    /**
     * {@inheritdoc}
     */
    public function toArray(): array
    {
        return [
            'text' => $this->text,
            'icon_url' => $this->iconUrl,
        ];
    }
}
