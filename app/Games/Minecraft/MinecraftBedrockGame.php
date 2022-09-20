<?php

namespace Azuriom\Games\Minecraft;

use Azuriom\Games\Game;
use Azuriom\Games\Minecraft\Servers\AzLink;
use Azuriom\Games\Minecraft\Servers\BedrockPing;
use Azuriom\Games\Minecraft\Servers\BedrockRcon;
use Azuriom\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class MinecraftBedrockGame extends Game
{
    public const PROFILE_LOOKUP = 'https://xbox-api.azuriom.com/profiles/';

    public const USERNAME_LOOKUP = 'https://xbox-api.azuriom.com/search/';

    public function name()
    {
        return 'Minecraft Bedrock';
    }

    public function id()
    {
        return 'mc-bedrock';
    }

    public function loginWithOAuth()
    {
        return true;
    }

    public function getSocialiteDriverName()
    {
        return 'xbox';
    }

    public function getAvatarUrl(User $user, int $size = 64)
    {
        $params = '';

        if ($size <= 424) {
            // Xbox Live only supports 64x64, 208x208 and 424x424
            $size = $size <= 64 ? 64 : ($size <= 208 ? 208 : 424);
            $params = "&w={$size}&h={$size}";
        }

        $url = Arr::get($this->getUserProfile($user), 'gamerpic');

        return $url !== null ? $url.$params : asset('img/user.png');
    }

    public function getUserUniqueId(string $name)
    {
        return Cache::remember("users.{$name}.xbox", now()->addMinutes(15), function () use ($name) {
            return Http::get(self::USERNAME_LOOKUP.$name)
                ->throw()
                ->json('xuid');
        });
    }

    public function getUserName(User $user)
    {
        return Arr::get($this->getUserProfile($user), 'gamertag');
    }

    public function getSupportedServers()
    {
        return [
            'bedrock-ping' => BedrockPing::class,
            'bedrock-rcon' => BedrockRcon::class,
            'mc-azlink' => AzLink::class,
        ];
    }

    public function getUserProfile(User $user)
    {
        return Cache::remember("users.{$user->id}.xbox", now()->addMinutes(15), function () use ($user) {
            return Http::get(self::PROFILE_LOOKUP.$user->game_id)
                ->throw()
                ->json() ?? [];
        });
    }

    public function trans(string $key, array $placeholders = [])
    {
        return trans('game.minecraft_bedrock.'.$key, $placeholders);
    }
}
