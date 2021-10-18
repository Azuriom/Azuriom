<?php

namespace Azuriom\Support\CommonMark\ExternalImage;

use League\CommonMark\Event\DocumentParsedEvent;
use League\CommonMark\Environment\EnvironmentInterface;
use League\CommonMark\Extension\CommonMark\Node\Inline\Image;

class ExternalImageProcessor
{
    private $environment;

    public function __construct(EnvironmentInterface $environment)
    {
        $this->environment = $environment;
    }

    public function __invoke(DocumentParsedEvent $e)
    {
        $internalHosts = $this->environment->getConfiguration()->get('external_image/internal_hosts', []);
        $imageProxy = $this->environment->getConfiguration()->get('external_image/image_proxy', '');

        $walker = $e->getDocument()->walker();
        while ($event = $walker->next()) {
            $image = $event->getNode();

            if ($event->isEntering() && $image instanceof Image) {
                $host = parse_url($image->getUrl(), PHP_URL_HOST);

                if (empty($host)) {
                    // Something is terribly wrong with this URL
                    continue;
                }

                if (self::hostMatches($host, $internalHosts)) {
                    $image->data['external'] = false;
                    continue;
                }

                // Host does not match our list
                $this->markImageAsExternal($image, $imageProxy);
            }
        }
    }

    private function markImageAsExternal(Image $image, string $imageProxy)
    {
        $image->data['external'] = true;
        $image->data['attributes']['data-original-src'] = $image->getUrl();

        if (! empty($imageProxy)) {
            $image->setUrl(str_replace('%s', rawurlencode($image->getUrl()), $imageProxy));
        }
    }

    private static function hostMatches(string $host, $compareTo)
    {
        foreach ((array) $compareTo as $c) {
            if (strncmp($c, '/', 1) === 0) {
                if (preg_match($c, $host)) {
                    return true;
                }
            } elseif ($c === $host) {
                return true;
            }
        }

        return false;
    }
}
