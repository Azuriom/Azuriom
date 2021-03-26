<?php

namespace Azuriom\Support;

use Azuriom\Support\CommonMark\BasicOnly\RemoveImageProcessor;
use Azuriom\Support\CommonMark\ExternalImage\ExternalImageExtension;
use League\CommonMark\CommonMarkConverter;
use League\CommonMark\Environment;
use League\CommonMark\Event\DocumentParsedEvent;
use League\CommonMark\Extension\Autolink\AutolinkExtension;
use League\CommonMark\Extension\DisallowedRawHtml\DisallowedRawHtmlExtension;
use League\CommonMark\Extension\ExternalLink\ExternalLinkExtension;
use League\CommonMark\Extension\GithubFlavoredMarkdownExtension;
use League\CommonMark\Extension\Strikethrough\StrikethroughExtension;
use League\CommonMark\Extension\Table\TableExtension;
use League\CommonMark\Extension\TaskList\TaskListExtension;

class Markdown
{
    public static function parse(string $text, bool $basic = false)
    {
        $environment = Environment::createCommonMarkEnvironment();
        $environment->addExtension(new AutolinkExtension());
        $environment->addExtension(new DisallowedRawHtmlExtension());
        $environment->addExtension(new StrikethroughExtension());
        $environment->addExtension(new ExternalLinkExtension());
        $environment->addExtension(new ExternalImageExtension());

        if ($basic) {
            $environment->addEventListener(DocumentParsedEvent::class, new RemoveImageProcessor());
        } else {
            $environment->addExtension(new TableExtension());
            $environment->addExtension(new TaskListExtension());
        }

        $internalHosts = [str_replace(['http://', 'https://'], '', config('app.url'))];

        $converter = new CommonMarkConverter([
            'html_input' => 'escape',
            'allow_unsafe_links' => false,
            'max_nesting_level' => 10,
            'external_link' => [
                'internal_hosts' => $internalHosts,
                'open_in_new_window' => true,
            ],
            'external_image' => [
                'internal_hosts' => $internalHosts,
                'image_proxy' => 'https://images.weserv.nl/?url=%s',
            ],
        ], $environment);

        return $converter->convertToHtml($text);
    }

    public static function parseRaw(string $text)
    {
        $environment = Environment::createCommonMarkEnvironment();
        $environment->addExtension(new GithubFlavoredMarkdownExtension());

        $converter = new CommonMarkConverter([], $environment);

        return $converter->convertToHtml($text);
    }
}
