<?php

namespace Azuriom\Http\Controllers\Admin;

use Azuriom\Discord\DiscordMessage;
use Azuriom\Discord\EmbedBuilder;
use Azuriom\Http\Controllers\Controller;
use Carbon\Carbon;

class DiscordController extends Controller
{

    /**
     * Send discord webhook
     * @param DiscordMessage $message
     */
    public static function send(DiscordMessage $message)
    {

        $url = setting('webhook');
        if ($url === null)
            return;

        $http = new \GuzzleHttp\Client(['timeout' => 5]);
        $http->post($url, ['json' => $message->toJson()]);

    }

}
