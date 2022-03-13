<?php

namespace Azuriom\Support;

use Azuriom\Support\CommonMark\BasicOnly\RemoveImageProcessor;
use Azuriom\Support\CommonMark\ExternalImage\ExternalImageExtension;
use League\CommonMark\Environment\Environment;
use League\CommonMark\Event\DocumentParsedEvent;
use League\CommonMark\Extension\Autolink\AutolinkExtension;
use League\CommonMark\Extension\CommonMark\CommonMarkCoreExtension;
use League\CommonMark\Extension\DisallowedRawHtml\DisallowedRawHtmlExtension;
use League\CommonMark\Extension\ExternalLink\ExternalLinkExtension;
use League\CommonMark\Extension\GithubFlavoredMarkdownExtension;
use League\CommonMark\Extension\Strikethrough\StrikethroughExtension;
use League\CommonMark\Extension\Table\TableExtension;
use League\CommonMark\Extension\TaskList\TaskListExtension;
use League\CommonMark\MarkdownConverter;

class Markdown
{
    public static function parse(string $text, bool $basic = false)
    {
        $internalHosts = [str_replace(['http://', 'https://'], '', config('app.url'))];

        $config = [
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
        ];

        $environment = new Environment($config);
        $environment->addExtension(new CommonMarkCoreExtension());
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

        $converter = new MarkdownConverter($environment);

        return $converter->convert($text)->getContent();
    }

    public static function parseRaw(string $text)
    {
        $environment = new Environment();
        $environment->addExtension(new CommonMarkCoreExtension());
        $environment->addExtension(new GithubFlavoredMarkdownExtension());

        $converter = new MarkdownConverter($environment);

        return $converter->convert($text)->getContent();
    }
}
