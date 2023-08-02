<?php

namespace Azuriom\Support\Discord\Embeds;

use Illuminate\Contracts\Support\Arrayable;

class EmbedAuthor implements Arrayable
{
    protected ?string $name = null;

    protected ?string $url = null;

    protected ?string $iconUrl = null;

    public function __construct(string $name, string $url = null, string $iconUrl = null)
    {
        $this->name = $name;
        $this->url = $url;
        $this->iconUrl = $iconUrl;
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'url' => $this->url,
            'icon_url' => $this->iconUrl,
        ];
    }
}
