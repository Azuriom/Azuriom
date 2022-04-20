<?php

namespace Azuriom\Http\Controllers\Api;

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
        $players = Arr::pluck($request->json('players', []), 'name', 'uuid');
        $cpuUsage = $request->json('system.cpu');
        $ramUsage = $request->json('system.ram');
        $tps = $request->json('worlds.tps');

        $server->updateData([
            'players' => count($players),
            'max_players' => $request->json('maxPlayers'),
            'cpu' => $cpuUsage >= 0 ? $cpuUsage : null,
            'ram' => $ramUsage >= 0 ? (int) $ramUsage : null,
            'tps' => $tps >= 0 ? round($tps, 2) : null,
            'loaded_chunks' => $request->json('worlds.chunks'),
            'entities' => $request->json('worlds.entities'),
        ], $request->json('full', false));

        $users = User::whereIn('name', $players)->get();
        $commands = $server->commands()
            ->with('user')
            ->whereIn('user_id', $users->modelKeys())
            ->orWhere('need_online', false)
            ->limit(100)
            ->get();
        $usersData = $users->map(function (User $user) {
            return [
                'id' => $user->id,
                'name' => $user->name,
                'uid' => $user->game_id,
                'money' => $user->money,
            ];
        });

        if (! $commands->isEmpty()) {
            ServerCommand::whereIn('id', $commands->modelKeys())->delete();

            $commands = $commands->groupBy('user.name')
                ->map(function (Collection $serverCommands) {
                    return $serverCommands->pluck('command');
                });
        }

        return response()->json([
            'commands' => $commands,
            'users' => $usersData,
            'retry' => $commands->count() > 100,
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
}
