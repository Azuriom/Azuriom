<?php


namespace Azuriom\Discord;


class DiscordMessage
{

    private $content;
    private $username;
    private $avatarUrl;
    private $tts = false;
    private $embeds = array();

    public function __construct()
    {

    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content): void
    {
        $this->content = $content;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username): void
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getAvatarUrl()
    {
        return $this->avatarUrl;
    }

    /**
     * @param mixed $avatarUrl
     */
    public function setAvatarUrl($avatarUrl): void
    {
        $this->avatarUrl = $avatarUrl;
    }

    /**
     * @return bool
     */
    public function isTts(): bool
    {
        return $this->tts;
    }

    /**
     * @param bool $tts
     */
    public function setTts(bool $tts): void
    {
        $this->tts = $tts;
    }

    /**
     * @return array
     */
    public function getEmbeds(): array
    {
        return $this->embeds;
    }

    /**
     * @param EmbedBuilder $builder
     */
    public function addEmbed(EmbedBuilder $builder)
    {
        array_push($this->embeds, $builder->toJson());
    }


    public function toJson()
    {
        return array(
            'content' => $this->content,
            'username' => $this->username,
            'avatar_url' => $this->avatarUrl,
            'tts' => $this->tts,
            'embeds' => $this->embeds,
        );

    }

}
