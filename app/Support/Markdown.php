<?php

namespace Azuriom\Support;

use Azuriom\Support\CommonMark\BasicOnly\RemoveImageProcessor;
use Azuriom\Support\CommonMark\ExternalImage\ExternalImageExtension;
use Illuminate\Support\Str;
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
    public const IMAGES_PROXY = 'https://images.weserv.nl/?url=%s';

    public static function parse(string $text, bool $basic = false): string
    {
        $internalHosts = [Str::remove(['http://', 'https://'], config('app.url'))];

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
                'image_proxy' => setting('markdown.images_proxy', self::IMAGES_PROXY),
            ],
        ];

        $environment = (new Environment($config))
            ->addExtension(new CommonMarkCoreExtension())
            ->addExtension(new AutolinkExtension())
            ->addExtension(new DisallowedRawHtmlExtension())
            ->addExtension(new StrikethroughExtension())
            ->addExtension(new ExternalLinkExtension())
            ->addExtension(new ExternalImageExtension());

        if ($basic) {
            $environment->addEventListener(DocumentParsedEvent::class, new RemoveImageProcessor());
        } else {
            $environment->addExtension(new TableExtension())
                ->addExtension(new TaskListExtension());
        }

        $converter = new MarkdownConverter($environment);

        return $converter->convert($text)->getContent();
    }

    public static function parseRaw(string $text): string
    {
        $environment = (new Environment())
            ->addExtension(new CommonMarkCoreExtension())
            ->addExtension(new GithubFlavoredMarkdownExtension());

        $converter = new MarkdownConverter($environment);

        return $converter->convert($text)->getContent();
    }

    public static function escape(string $text): string
    {
        return addcslashes($text, '\\`*_[]()');
    }
}
