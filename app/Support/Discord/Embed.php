<?php

namespace Azuriom\Support\Discord;

use Azuriom\Support\Discord\Embeds\EmbedAuthor;
use Azuriom\Support\Discord\Embeds\EmbedField;
use Azuriom\Support\Discord\Embeds\EmbedFooter;
use Azuriom\Support\Discord\Embeds\EmbedImage;
use Azuriom\Support\Discord\Embeds\EmbedThumbnail;
use Carbon\Carbon;
use Carbon\CarbonInterface;
use DateTimeInterface;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Str;
use InvalidArgumentException;

class Embed implements Arrayable
{
    protected ?string $title = null;

    protected ?string $description = null;

    protected ?string $url = null;

    protected ?CarbonInterface $timestamp = null;

    protected ?int $color = null;

    protected ?EmbedFooter $footer = null;

    protected ?EmbedImage $image = null;

    protected ?EmbedThumbnail $thumbnail = null;

    protected ?EmbedAuthor $author = null;

    protected ?array $fields = [];

    /**
     * Create a new message instance.
     */
    public static function create(): self
    {
        return new self();
    }

    /**
     * Set the title of the embed.
     */
    public function title(?string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Set the description of embed.
     */
    public function description(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Set the URL of embed.
     */
    public function url(?string $url): self
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Set the timestamp of embed content.
     */
    public function timestamp(?DateTimeInterface $timestamp): self
    {
        $this->timestamp = Carbon::instance($timestamp);

        return $this;
    }

    /**
     * Set the color code of the embed.
     */
    public function color(int|string $color): self
    {
        if (is_string($color) && Str::startsWith($color, '#')) {
            $this->color = (int) hexdec(Str::substr($color, 1));

            return $this;
        }

        if (! is_numeric($color)) {
            throw new InvalidArgumentException('Color format must be hex or decimal.');
        }

        $this->color = (int) $color;

        return $this;
    }

    /**
     * Set the footer of the embed.
     */
    public function footer(string $text, ?string $iconUrl = null): self
    {
        $this->footer = new EmbedFooter($text, $iconUrl);

        return $this;
    }

    /**
     * Set the image of the embed.
     */
    public function image(string $url, ?int $height = null, ?int $width = null): self
    {
        $this->image = new EmbedImage($url, $height, $width);

        return $this;
    }

    /**
     * Set the thumbnail of the embed.
     */
    public function thumbnail(string $url): self
    {
        $this->thumbnail = new EmbedThumbnail($url);

        return $this;
    }

    /**
     * Set the author of the embed.
     */
    public function author(string $name, ?string $url = null, ?string $iconUrl = null): self
    {
        $this->author = new EmbedAuthor($name, $url, $iconUrl);

        return $this;
    }

    /**
     * Add a field to the embed.
     */
    public function addField(string $name, string $value, bool $inline = false): self
    {
        $this->fields[] = new EmbedField($name, $value, $inline);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'url' => $this->url,
            'timestamp' => $this->timestamp?->toAtomString(),
            'color' => $this->color,
            'footer' => $this->footer?->toArray(),
            'thumbnail' => $this->thumbnail?->toArray(),
            'image' => $this->image?->toArray(),
            'author' => $this->author?->toArray(),
            'fields' => array_map(function (EmbedField $field) {
                return $field->toArray();
            }, $this->fields),
        ];
    }
}
