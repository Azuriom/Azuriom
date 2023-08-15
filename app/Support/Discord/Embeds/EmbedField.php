<?php

namespace Azuriom\Support\Discord\Embeds;

use Illuminate\Contracts\Support\Arrayable;

class EmbedField implements Arrayable
{
    protected string $name;

    protected string $value;

    protected ?bool $inline;

    public function __construct(string $name, string $value, bool $inline = null)
    {
        $this->name = $name;
        $this->value = $value;
        $this->inline = $inline;
    }

    /**
     * {@inheritdoc}
     */
    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'value' => $this->value,
            'inline' => $this->inline,
        ];
    }
}
