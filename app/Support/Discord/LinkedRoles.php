<?php

namespace Azuriom\Support\Discord;

use Azuriom\Models\DiscordAccount;
use Azuriom\Models\Role;
use Illuminate\Support\Facades\Http;

class LinkedRoles
{
    protected const BASE_URL = 'https://discord.com/api/v10';

    public static function clearRole(DiscordAccount $user)
    {
        static::linkRole($user, (new Role())->forceFill([
            'id' => 0,
            'power' => 0,
        ]));
    }

    public static function linkRole(DiscordAccount $user, ?Role $role = null)
    {
        $role ??= $user->user->role;
        $accessToken = $user->refreshAccessToken();
        $clientId = setting('discord.client_id');

        if ($clientId === null) {
            return;
        }

        $url = self::BASE_URL."/users/@me/applications/{$clientId}/role-connection";
        Http::asJson()->withToken($accessToken)->put($url, [
            'platform_name' => site_name(),
            'metadata' => [
                'role_id' => $role->id,
                'role_power' => $role->power,
            ],
        ])->throw();
    }

    public static function refreshAccessToken(DiscordAccount $user)
    {
        $response = Http::asForm()->post(self::BASE_URL.'/oauth2/token', [
            'client_id' => setting('discord.client_id'),
            'client_secret' => setting('discord.client_secret'),
            'grant_type' => 'refresh_token',
            'refresh_token' => $user->refresh_token,
        ])->throw();

        $user->update([
            'access_token' => $response->json('access_token'),
            'refresh_token' => $response->json('refresh_token'),
            'expires_at' => now()->addSeconds($response->json('expires_in')),
        ]);
    }

    public static function registerMetadata(string $clientId, string $token)
    {
        $url = "https://discord.com/api/v10/applications/{$clientId}/role-connections/metadata";
        Http::asJson()->withToken($token, 'Bot')->put($url, [
            [
                'key' => 'role_id',
                'name' => trans('messages.discord_roles.id.name'),
                'description' => trans('messages.discord_roles.id.description'),
                'type' => RoleMetadataType::INTEGER_EQUAL->value,
            ],
            [
                'key' => 'role_power',
                'name' => trans('messages.discord_roles.power.name'),
                'description' => trans('messages.discord_roles.power.description'),
                'type' => RoleMetadataType::INTEGER_GREATER_THAN_OR_EQUAL->value,
            ],
        ])->throw();
    }
}
