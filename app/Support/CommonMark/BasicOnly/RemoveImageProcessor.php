<?php

namespace Azuriom\Support\CommonMark\BasicOnly;

use League\CommonMark\Event\DocumentParsedEvent;
use League\CommonMark\Extension\CommonMark\Node\Inline\Image;

class RemoveImageProcessor
{
    public function __invoke(DocumentParsedEvent $e)
    {
        $walker = $e->getDocument()->walker();
        while ($event = $walker->next()) {
            $node = $event->getNode();

            if ($event->isEntering() && $node instanceof Image) {
                $node->detach();
            }
        }
    }
}
