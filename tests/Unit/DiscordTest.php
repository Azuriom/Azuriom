<?php

namespace Tests\Unit;

use Azuriom\Support\Discord\DiscordWebhook;
use Azuriom\Support\Discord\Embed;
use InvalidArgumentException;
use Tests\TestCase;

class DiscordTest extends TestCase
{
    public function testDiscordWebhook()
    {
        $embed = Embed::create()
            ->color(7506394)
            ->title('Hello')
            ->description('This is the description')
            ->addField('A field', 'Wow', true)
            ->footer('The footer text')
            ->url('https://github.com')
            ->author('Wampus', 'https://github.com', 'https://github.com');

        $webhook = DiscordWebhook::create()
            ->content('Hello World !')
            ->username('Wampus')
            ->tts()
            ->avatarUrl('https://discordapp.com')
            ->addEmbed($embed);

        $this->assertSame([
            'content' => 'Hello World !',
            'username' => 'Wampus',
            'avatar_url' => 'https://discordapp.com',
            'tts' => true,
            'embeds' => [
                [
                    'title' => 'Hello',
                    'description' => 'This is the description',
                    'url' => 'https://github.com',
                    'timestamp' => null,
                    'color' => 7506394,
                    'footer' => [
                        'text' => 'The footer text',
                    ],
                    'thumbnail' => null,
                    'author' => [
                        'name' => 'Wampus',
                        'url' => 'https://github.com',
                        'icon_url' => 'https://github.com',
                    ],
                    'fields' => [
                        [
                            'name' => 'A field',
                            'value' => 'Wow',
                            'inline' => true,
                        ],
                    ],
                ],
            ],
        ], $webhook->toArray());
    }

    public function testEmbedColorConversion()
    {
        $embed = Embed::create();

        foreach (['#7289DA', '#7289da', '7506394', 7506394] as $color) {
            $this->assertSame(7506394, $embed->color($color)->toArray()['color']);
        }

        $this->expectException(InvalidArgumentException::class);

        $embed->color('7289DA');
    }
}
