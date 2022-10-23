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
    /**
     * Title of the embed.
     *
     * @var string|null
     */
    protected ?string $title = null;

    /**
     * Description of embed.
     *
     * @var string|null
     */
    protected ?string $description = null;

    /**
     * Url of embed.
     *
     * @var string|null
     */
    protected ?string $url = null;

    /**
     * Timestamp of embed content.
     *
     * @var \Carbon\CarbonInterface|null
     */
    protected ?CarbonInterface $timestamp = null;

    /**
     * Color code of the embed.
     *
     * @var int|null
     */
    protected ?int $color = null;

    /**
     * Footer information.
     *
     * @var \Azuriom\Support\Discord\Embeds\EmbedFooter|null
     */
    protected ?EmbedFooter $footer = null;

    /**
     * Image information.
     *
     * @var \Azuriom\Support\Discord\Embeds\EmbedImage|null
     */
    protected ?EmbedImage $image = null;

    /**
     * Thumbnail information.
     *
     * @var \Azuriom\Support\Discord\Embeds\EmbedThumbnail|null
     */
    protected ?EmbedThumbnail $thumbnail = null;

    /**
     * Author information.
     *
     * @var \Azuriom\Support\Discord\Embeds\EmbedAuthor|null
     */
    protected ?EmbedAuthor $author = null;

    /**
     * Fields information.
     *
     * @var \Azuriom\Support\Discord\Embeds\EmbedFooter[]|null
     */
    protected ?array $fields = [];

    /**
     * Create a new message instance.
     *
     * @return self
     */
    public static function create()
    {
        return new self();
    }

    /**
     * Set the title of the embed.
     *
     * @param  string|null  $title
     * @return $this
     */
    public function title(?string $title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Set the description of embed.
     *
     * @param  string|null  $description
     * @return $this
     */
    public function description(?string $description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Set the Url of embed.
     *
     * @param  string|null  $url
     * @return $this
     */
    public function url(?string $url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Set the timestamp of embed content.
     *
     * @param  \DateTimeInterface|null  $timestamp
     * @return $this
     */
    public function timestamp(?DateTimeInterface $timestamp)
    {
        $this->timestamp = Carbon::instance($timestamp);

        return $this;
    }

    /**
     * Set the color code of the embed.
     *
     * @param  int|string  $color
     * @return $this
     */
    public function color(int|string $color)
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
     *
     * @param  string  $text
     * @param  string|null  $iconUrl
     * @return $this
     */
    public function footer(string $text, string $iconUrl = null)
    {
        $this->footer = new EmbedFooter($text, $iconUrl);

        return $this;
    }

    /**
     * Set the image of the embed.
     *
     * @param  string  $url
     * @param  int|null  $height
     * @param  int|null  $width
     * @return $this
     */
    public function image(string $url, int $height = null, int $width = null)
    {
        $this->image = new EmbedImage($url, $height, $width);

        return $this;
    }

    /**
     * Set the thumbnail of the embed.
     *
     * @param  string  $url
     * @return $this
     */
    public function thumbnail(string $url)
    {
        $this->thumbnail = new EmbedThumbnail($url);

        return $this;
    }

    /**
     * Set the author of the embed.
     *
     * @param  string  $name
     * @param  string|null  $url
     * @param  string|null  $iconUrl
     * @return $this
     */
    public function author(string $name, string $url = null, string $iconUrl = null)
    {
        $this->author = new EmbedAuthor($name, $url, $iconUrl);

        return $this;
    }

    /**
     * Add a field to the embed.
     *
     * @param  string  $name
     * @param  string  $value
     * @param  bool  $inline
     * @return $this
     */
    public function addField(string $name, string $value, bool $inline = false)
    {
        $this->fields[] = new EmbedField($name, $value, $inline);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function toArray()
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
