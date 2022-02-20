<?php

namespace Azuriom\Support\Discord;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use InvalidArgumentException;

class DiscordWebhook implements Arrayable
{
    /**
     * The message contents (up to 2000 characters).
     *
     * @var string|null
     */
    protected ?string $content = null;

    /**
     * Override the default username of the webhook.
     *
     * @var string|null
     */
    protected ?string $username = null;

    /**
     * Override the default avatar of the webhook.
     *
     * @var string|null
     */
    protected ?string $avatarUrl = null;

    /**
     * Whether or not this is a TTS message.
     *
     * @var bool|null
     */
    protected ?bool $tts = null;

    /**
     * Embedded rich content.
     *
     * @var \Azuriom\Support\Discord\Embed[]
     */
    protected array $embeds = [];

    private function __construct(string $content = null)
    {
        $this->content = $content;
    }

    /**
     * Create a new webhook instance.
     *
     * @param  string|null  $content
     * @return self
     */
    public static function create(string $content = null)
    {
        return new self($content);
    }

    /**
     * Set the message contents (up to 2000 characters).
     *
     * @param  string|null  $content
     * @return $this
     */
    public function content(?string $content)
    {
        if (Str::length($content) > 2000) {
            throw new InvalidArgumentException('Embed content is limited to 2000 characters');
        }

        $this->content = $content;

        return $this;
    }

    /**
     * Override the default username of the webhook.
     *
     * @param  string|null  $username
     * @return $this
     */
    public function username(?string $username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Override the default avatar of the webhook.
     *
     * @param  string|null  $avatarUrl
     * @return $this
     */
    public function avatarUrl(string $avatarUrl = null)
    {
        if (filter_var($avatarUrl, FILTER_VALIDATE_URL) === false) {
            throw new InvalidArgumentException('The avatar url must be a valid URL');
        }

        $this->avatarUrl = $avatarUrl;

        return $this;
    }

    /**
     * Set whether or not this is a TTS message.
     *
     * @param  bool  $tts
     * @return $this
     */
    public function tts(bool $tts = true)
    {
        $this->tts = $tts;

        return $this;
    }

    /**
     * Add an embed rich content.
     *
     * @param  \Azuriom\Support\Discord\Embed  $embed
     * @return $this
     */
    public function addEmbed(Embed $embed)
    {
        $this->embeds[] = $embed;

        return $this;
    }

    /**
     * Send the webhook to Discord.
     *
     * @param  string  $url
     * @param  bool  $throw
     * @return \Illuminate\Http\Client\Response
     *
     * @throws \Illuminate\Http\Client\HttpClientException
     */
    public function send(string $url, bool $throw = true)
    {
        $response = Http::post($url, $this->toArray());

        return $throw ? $response->throw() : $response;
    }

    /**
     * {@inheritdoc}
     */
    public function toArray()
    {
        return [
            'content' => $this->content,
            'username' => $this->username,
            'avatar_url' => $this->avatarUrl,
            'tts' => $this->tts,
            'embeds' => array_map(function (Embed $embed) {
                return $embed->toArray();
            }, $this->embeds),
        ];
    }
}
