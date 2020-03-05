<?php


namespace Azuriom\Discord;


class EmbedBuilder
{

    private $title;
    private $description;
    private $url;
    private $color;
    private $timestamp;
    private $footerText;
    private $footerUrl;
    private $image;
    private $thumbnail;
    private $authorName;
    private $authorUrl;
    private $fields = array();

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title): void
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url): void
    {
        $this->url = $url;
    }

    /**
     * @return mixed
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @param mixed $color
     */
    public function setColor($color): void
    {
        $this->color = $color;
    }

    /**
     * @return mixed
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * @param mixed $timestamp
     */
    public function setTimestamp($timestamp): void
    {
        $this->timestamp = $timestamp;
    }

    /**
     * @return mixed
     */
    public function getFooterText()
    {
        return $this->footerText;
    }

    /**
     * @param mixed $footerText
     */
    public function setFooterText($footerText): void
    {
        $this->footerText = $footerText;
    }

    /**
     * @return mixed
     */
    public function getFooterUrl()
    {
        return $this->footerUrl;
    }

    /**
     * @param mixed $footerUrl
     */
    public function setFooterUrl($footerUrl): void
    {
        $this->footerUrl = $footerUrl;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image): void
    {
        $this->image = $image;
    }

    /**
     * @param $name
     * @param $value
     * @param bool $inline
     */
    public function addField($name, $value, bool $inline = false)
    {
        array_push($this->fields, [
            'name' => $name,
            'value' => $value,
            'inline' => $inline,
        ]);
    }

    /**
     * @return mixed
     */
    public function getThumbnail()
    {
        return $this->thumbnail;
    }

    /**
     * @param mixed $thumbnail
     */
    public function setThumbnail($thumbnail): void
    {
        $this->thumbnail = $thumbnail;
    }

    /**
     * @return mixed
     */
    public function getAuthorName()
    {
        return $this->authorName;
    }

    /**
     * @param mixed $authorName
     */
    public function setAuthorName($authorName): void
    {
        $this->authorName = $authorName;
    }

    /**
     * @return mixed
     */
    public function getAuthorUrl()
    {
        return $this->authorUrl;
    }

    /**
     * @param mixed $authorUrl
     */
    public function setAuthorUrl($authorUrl): void
    {
        $this->authorUrl = $authorUrl;
    }

    /**
     * @return array
     */
    public function getFields(): array
    {
        return $this->fields;
    }


    public function toJson()
    {
        return array(
            'title' => $this->title,
            'description' => $this->description,
            'url' => $this->url,
            'timestamp' => $this->timestamp,
            'color' => hexdec($this->color),
            'footer' => [
                'text' => $this->footerText,
                'icon_url' => $this->footerUrl,
            ],
            'image' => [
                'url' => $this->image,
            ],
            'thumbnail' => [
                'url' => $this->thumbnail,
            ],
            'author' => [
                'name' => $this->authorName,
                'url' => $this->authorUrl,
            ],
            'fields' => $this->fields
        );
    }

}
