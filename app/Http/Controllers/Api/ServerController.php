<?php

namespace Azuriom\Http\Controllers\Api;

use Azuriom\Games\Steam\SteamID;
use Azuriom\Http\Controllers\Controller;
use Azuriom\Models\Role;
use Azuriom\Models\Server;
use Azuriom\Models\ServerCommand;
use Azuriom\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;

class ServerController extends Controller
{
    public function status()
    {
        return response()->noContent();
    }

    public function fetch(Request $request)
    {
        $server = Server::find($request->input('server-id'));
        $uidKey = $request->json('platform.type') === 'GMOD';
        $rawPlayers = $request->json('players', []);
        $maxPlayers = $request->json('maxPlayers');

        $players = $uidKey
            ? Arr::pluck($rawPlayers, 'name', 'uuid')
            : Arr::pluck($rawPlayers, 'uid');

        $server->updateData(array_merge(
            ['players' => count($players), 'max_players' => $maxPlayers],
            $request->json('system', []),
            $request->json('worlds', []),
        ), $request->json('full', false));

        $users = User::whereIn($uidKey ? 'game_id' : 'name', $players)->get();
        $commands = $server->commands()
            ->with('user')
            ->whereIn('user_id', $users->modelKeys())
            ->orWhere('need_online', false)
            ->limit(100)
            ->get();

        if (! $commands->isEmpty()) {
            ServerCommand::whereIn('id', $commands->modelKeys())->delete();

            $commands = $uidKey
                ? $this->mapCommands($commands)
                : $this->mapLegacyCommands($commands);
        }

        return response()->json([
            'commands' => $commands,
            'retry' => $commands->count() > 100,
            'users' => $users->map(fn (User $user) => [
                'id' => $user->id,
                'name' => $user->name,
                'uid' => $user->game_id,
                'money' => $user->money,
            ]),
        ]);
    }

    public function register(Request $request)
    {
        $data = $this->validate($request, [
            'name' => ['required', 'string', 'max:25', 'unique:users'],
            'email' => ['sometimes', 'nullable', 'max:100', 'unique:users'],
            'game_id' => ['required', 'string', 'max:100', 'unique:users'],
            'password' => ['required', 'string'],
            'ip' => ['sometimes', 'nullable'],
        ]);

        $name = $request->input('name');
        $user = User::firstWhere('game_id', $request->input('game_id'));

        if ($user !== null) {
            $user->update(['name' => $name]);

            return response()->noContent();
        }

        User::forceCreate(array_merge(Arr::except($data, 'ip'), [
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role_id' => Role::defaultRoleId(),
            'last_login_ip' => $request->input('ip'),
            'last_login_at' => now(),
        ]));

        return response()->noContent();
    }

    public function updateEmail(Request $request)
    {
        $data = $this->validate($request, [
            'game_id' => ['required', 'string', 'max:100', 'exists:users,game_id'],
            'email' => ['required', 'string', 'email', 'max:50', 'unique:users'],
        ]);

        User::where('game_id', $request->input('uuid'))
            ->firstOrFail()
            ->update(Arr::only($data, 'email'));

        return response()->noContent();
    }

    protected function mapLegacyCommands(Collection $commands)
    {
        return $commands->groupBy('user.name')
            ->map(function (Collection $serverCommands) {
                return $serverCommands->pluck('command');
            });
    }

    protected function mapCommands(Collection $commands)
    {
        return $commands->groupBy('user.name')
            ->map(function (Collection $serverCommands) {
                $user = $serverCommands->first()->user;

                return [
                    'name' => $user->name,
                    'uid' => $user->game_id,
                    'steamid_32' => SteamID::convertTo32($user->game_id),
                    'values' => $serverCommands->pluck('command'),
                ];
            });
    }
}
