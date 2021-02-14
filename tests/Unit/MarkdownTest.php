<?php

namespace Tests\Unit;

use Azuriom\Support\CommonMark\ExternalImage\ExternalImageExtension;
use Azuriom\Support\Markdown;
use League\CommonMark\CommonMarkConverter;
use League\CommonMark\Environment;
use Tests\TestCase;

class MarkdownTest extends TestCase
{
    public function testParseDefault()
    {
        $markdown = 'This is markdown with **bold** and ~~strikethrough~~ with https://autolink.ltd, no raw html<br>.';
        $expected = "<p>This is markdown with <strong>bold</strong> and <del>strikethrough</del> with <a rel=\"noopener noreferrer\" target=\"_blank\" href=\"https://autolink.ltd\">https://autolink.ltd</a>, no raw html&lt;br&gt;.</p>\n";

        $this->assertSame($expected, Markdown::parse($markdown));
    }

    public function testParseRaw()
    {
        $markdown = 'This is markdown with **bold** and ~~strikethrough~~ with https://autolink.ltd and raw <b>html</b>.';
        $expected = "<p>This is markdown with <strong>bold</strong> and <del>strikethrough</del> with <a href=\"https://autolink.ltd\">https://autolink.ltd</a> and raw <b>html</b>.</p>\n";

        $this->assertSame($expected, Markdown::parseRaw($markdown));
    }

    public function testExternalImageExtension()
    {
        $localMarkdown = '![Azuriom](http://127.0.0.1/assets/img/logo.png)';
        $externalMarkdown = '![Azuriom](https://azuriom.com/assets/img/logo.png)';

        $environment = Environment::createCommonMarkEnvironment();

        $environment->addExtension(new ExternalImageExtension());

        $converter = new CommonMarkConverter([
            'external_image' => [
                'internal_hosts' => ['127.0.0.1'],
                'image_proxy' => 'https://images.weserv.nl/?url=%s',
            ],
        ], $environment);

        $expectedLocal = "<p><img src=\"http://127.0.0.1/assets/img/logo.png\" alt=\"Azuriom\" /></p>\n";
        $expectedExternal = "<p><img data-original-src=\"https://azuriom.com/assets/img/logo.png\" src=\"https://images.weserv.nl/?url=https%3A%2F%2Fazuriom.com%2Fassets%2Fimg%2Flogo.png\" alt=\"Azuriom\" /></p>\n";

        $this->assertSame($expectedLocal, $converter->convertToHtml($localMarkdown));
        $this->assertSame($expectedExternal, $converter->convertToHtml($externalMarkdown));
    }
}
