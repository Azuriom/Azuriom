<?php

namespace Azuriom\Support\CommonMark\ExternalImage;

use Nette\Schema\Expect;
use League\CommonMark\Event\DocumentParsedEvent;
use League\Config\ConfigurationBuilderInterface;
use League\CommonMark\Environment\EnvironmentBuilderInterface;
use League\CommonMark\Extension\ConfigurableExtensionInterface;

class ExternalImageExtension implements ConfigurableExtensionInterface
{
    public function configureSchema(ConfigurationBuilderInterface $builder): void
    {
        $builder->addSchema('external_image', Expect::structure([
            'internal_hosts' => Expect::type('string|string[]'),
            'image_proxy' => Expect::type('string'),
        ]));
    }

    public function register(EnvironmentBuilderInterface $environment): void
    {
        $environment->addEventListener(DocumentParsedEvent::class, new ExternalImageProcessor($environment));
    }
}
