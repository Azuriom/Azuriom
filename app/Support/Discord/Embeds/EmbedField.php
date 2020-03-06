<?php

namespace Azuriom\Support\Discord\Embeds;

use Illuminate\Contracts\Support\Arrayable;

class EmbedField implements Arrayable
{
    /**
     * Name of the field.
     *
     * @var string
     */
    protected $name;

    /**
     * Value of the field.
     *
     * @var string
     */
    protected $value;

    /**
     * Whether or not this field should display inline.
     *
     * @var bool|null
     */
    protected $inline;

    /**
     * Create a new field instance.
     *
     * @param  string  $name
     * @param  string  $value
     * @param  bool  $inline
     */
    public function __construct(string $name, string $value, bool $inline = null)
    {
        $this->name = $name;
        $this->value = $value;
        $this->inline = $inline;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return [
            'name' => $this->name,
            'value' => $this->value,
            'inline' => $this->inline,
        ];
    }
}
