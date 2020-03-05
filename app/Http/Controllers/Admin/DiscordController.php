<?php

namespace Azuriom\Http\Controllers\Admin;

use Azuriom\Discord\DiscordMessage;
use Azuriom\Discord\EmbedBuilder;
use Azuriom\Http\Controllers\Controller;
use Carbon\Carbon;

class DiscordController extends Controller
{

    public function testWebhook()
    {

        $discord = new DiscordMessage();
        $discord->setContent("Je suis un test");
        $discord->setUsername("Le plus beau");

        $embed = new EmbedBuilder();
        $embed->setTitle('test de titre');
        $embed->setDescription('je suis un message sympa');
        $embed->setAuthorName('Un author sympa');
        $embed->setColor('CCCCCC');
        $embed->addField('test', 'je suis un test');
        $embed->setFooterText("Mon message sympa");
        $embed->setTimestamp(Carbon::now());
        $discord->addEmbed($embed);

        $this->send($discord);

    }

    /**
     * Send discord webhook
     * @param DiscordMessage $message
     */
    public function send(DiscordMessage $message)
    {

        $url = setting('webhook');
        if ($url === null)
            return;

        $http = new \GuzzleHttp\Client(['timeout' => 5]);
        $http->post($url, ['json' => $message->toJson()]);

    }

}
