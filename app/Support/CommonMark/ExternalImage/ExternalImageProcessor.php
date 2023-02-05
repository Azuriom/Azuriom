<?php

namespace Azuriom\Support\CommonMark\ExternalImage;

use Illuminate\Support\Str;
use League\CommonMark\Environment\EnvironmentInterface;
use League\CommonMark\Event\DocumentParsedEvent;
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
        $config = $this->environment->getConfiguration();
        $internalHosts = $config->get('external_image/internal_hosts');
        $imageProxy = $config->get('external_image/image_proxy');

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
                    $image->data->set('external', false);

                    continue;
                }

                // Host does not match our list
                $this->markImageAsExternal($image, $imageProxy);
            }
        }
    }

    private function markImageAsExternal(Image $image, string $imageProxy)
    {
        $image->data->set('external', true);
        $image->data->set('attributes.data-original-src', $image->getUrl());

        if (! empty($imageProxy)) {
            $image->setUrl(str_replace('%s', rawurlencode($image->getUrl()), $imageProxy));
        }
    }

    private static function hostMatches(string $host, $compareTo)
    {
        if (Str::startsWith($host, '/')) {
            return true;
        }

        foreach ((array) $compareTo as $c) {
            if (Str::contains($c, ':')) {
                $c = Str::before($c, ':');
            }

            if (Str::startsWith($c, '/')) {
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
