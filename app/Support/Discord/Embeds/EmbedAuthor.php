<?php

namespace Azuriom\Support\Discord\Embeds;

use Illuminate\Contracts\Support\Arrayable;

class EmbedAuthor implements Arrayable
{
    /**
     * Name of the author.
     *
     * @var string|null
     */
    protected $name;

    /**
     * URL of author.
     *
     * @var string|null
     */
    protected $url;

    /**
     * URL of author icon (only supports http(s) and attachments).
     *
     * @var string|null
     */
    protected $iconUrl;

    /**
     * Create a new author instance.
     *
     * @param  string  $name
     * @param  string|null  $url
     * @param  string|null  $iconUrl
     */
    public function __construct(string $name, string $url = null, string $iconUrl = null)
    {
        $this->name = $name;
        $this->url = $url;
        $this->iconUrl = $iconUrl;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return [
            'name' => $this->name,
            'url' => $this->url,
            'icon_url' => $this->iconUrl,
        ];
    }
}
