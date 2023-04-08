<?php

namespace Azuriom\Http\Controllers\Api;

use Azuriom\Games\Steam\SteamID;
use Azuriom\Http\Controllers\Controller;
use Azuriom\Http\Resources\ServerCollection;
use Azuriom\Models\Role;
use Azuriom\Models\Server;
use Azuriom\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;

class ServerController extends Controller
{
    public function index()
    {
        $serverId = (int) setting('servers.default');
        $servers = Server::where('home_display', true)
            ->when($serverId, function (Builder $query) use ($serverId) {
                $query->orWhere('id', $serverId);
            })
            ->get();

        $servers = $servers->where('home_display', true);
        $server = $servers->first(fn (Server $server) => $server->id === $serverId);

        return new ServerCollection($servers, $server);
    }

    public function status()
    {
        return response()->noContent(headers: ['AzLink-Status' => 'Success']);
    }

    public function fetch(Request $request)
    {
        /** @var \Azuriom\Models\Server $server */
        $server = Server::find($request->input('server-id'));
        $uidKey = $request->json('platform.type') === 'GMOD';
        $rawPlayers = $request->json('players', []);
        $maxPlayers = $request->json('maxPlayers');

        $players = $uidKey
            ? Arr::pluck($rawPlayers, 'uid')
            : Arr::pluck($rawPlayers, 'name', 'uuid');

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
            $commands->toQuery()->delete();

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

    public function user(User $user)
    {
        return response()->json([
            'id' => $user->id,
            'name' => $user->name,
            'uid' => $user->game_id,
            'money' => $user->money,
        ]);
    }

    public function addMoney(Request $request, User $user)
    {
        return $this->editMoney($request, $user, function (float $amount) use ($user) {
            $user->increment('money', $amount);
        });
    }

    public function removeMoney(Request $request, User $user)
    {
        return $this->editMoney($request, $user, function (float $amount) use ($user) {
            $user->decrement('money', min($amount, $user->money));
        });
    }

    public function setMoney(Request $request, User $user)
    {
        return $this->editMoney($request, $user, function (float $amount) use ($user) {
            $user->update(['money' => $amount]);
        });
    }

    protected function editMoney(Request $request, User $user, callable $action)
    {
        $this->validate($request, ['amount' => 'required|numeric|min:0.01']);

        $balance = $user->money;
        $action($request->input('amount'));

        return response()->json([
            'old_balance' => $balance,
            'new_balance' => $user->money,
        ]);
    }

    protected function mapLegacyCommands(Collection $commands)
    {
        return $commands->groupBy('user.name')
            ->map(fn (Collection $group) => $group->pluck('command'));
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
