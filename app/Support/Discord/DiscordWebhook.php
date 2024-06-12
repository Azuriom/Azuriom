<?php

namespace Azuriom\Support\Discord;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use InvalidArgumentException;

class DiscordWebhook implements Arrayable
{
    protected ?string $content = null;

    protected ?string $username = null;

    protected ?string $avatarUrl = null;

    protected ?bool $tts = null;

    protected array $embeds = [];

    private function __construct(?string $content = null)
    {
        $this->content = $content;
    }

    /**
     * Create a new webhook instance.
     */
    public static function create(?string $content = null): self
    {
        return new self($content);
    }

    /**
     * Set the message contents (up to 2000 characters).
     */
    public function content(?string $content): self
    {
        if (Str::length($content) > 2000) {
            throw new InvalidArgumentException('Embed content is limited to 2000 characters');
        }

        $this->content = $content;

        return $this;
    }

    /**
     * Override the default username of the webhook.
     */
    public function username(?string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Override the default avatar of the webhook.
     */
    public function avatarUrl(?string $avatarUrl = null): self
    {
        if (filter_var($avatarUrl, FILTER_VALIDATE_URL) === false) {
            throw new InvalidArgumentException('The avatar url must be a valid URL');
        }

        $this->avatarUrl = $avatarUrl;

        return $this;
    }

    /**
     * Set whether this is a TTS message.
     */
    public function tts(bool $tts = true): self
    {
        $this->tts = $tts;

        return $this;
    }

    /**
     * Add an embed rich content.
     */
    public function addEmbed(Embed $embed): self
    {
        $this->embeds[] = $embed;

        return $this;
    }

    /**
     * Send the webhook to Discord.
     *
     * @throws \Illuminate\Http\Client\HttpClientException
     */
    public function send(string $url, bool $throw = true): Response
    {
        return Http::post($url, $this->toArray())->throwIf($throw);
    }

    /**
     * {@inheritdoc}
     */
    public function toArray(): array
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
