<?php

namespace Azuriom\Http\Controllers\Api;

use Azuriom\Games\Steam\SteamID;
use Azuriom\Http\Controllers\Controller;
use Azuriom\Http\Resources\ServerCollection;
use Azuriom\Models\Role;
use Azuriom\Models\Server;
use Azuriom\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Auth\Events\Registered;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

class ServerController extends Controller
{
    private const UID_KEYS = ['GMOD', 'FIVEM', 'OXIDE'];

    public function user(User $user)
    {
        return response()->json([
            'id' => $user->id,
            'name' => $user->name,
            'uid' => $user->game_id,
            'money' => $user->money,
        ]);
    }

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
        return response()->json([
            'status' => 'success',
            'game' => game()->id(),
        ]);
    }

    public function fetch(Request $request)
    {
        /** @var \Azuriom\Models\Server $server */
        $server = Server::find($request->input('server-id'));
        $uidKey = $request->json('platform.key') === 'uid'
            || in_array($request->json('platform.type'), self::UID_KEYS, true);
        $rawPlayers = $request->json('players', []);
        $maxPlayers = $request->json('maxPlayers');

        $players = $uidKey
            ? Arr::pluck($rawPlayers, 'uid')
            : Arr::pluck($rawPlayers, 'name', 'uuid');

        $server->updateData([
            'players' => count($players),
            'max_players' => $maxPlayers,
            ...$request->json('system', []),
            ...$request->json('worlds', []),
        ], $request->json('full', false));

        $users = User::whereIn($uidKey ? 'game_id' : 'name', $players)->get();
        $commands = $server->commands()
            ->with('user')
            ->where(function (Builder $query) use ($users) {
                $query->whereIn('user_id', $users->modelKeys())
                    ->orWhere('need_online', false);
            })
            ->limit(100)
            ->get();

        if (! $commands->isEmpty()) {
            $commands->toQuery()->delete();

            $commands = $uidKey
                ? $this->mapCommands($commands)
                : $this->mapLegacyCommands($commands);
        }

        return response()->json([
            'game' => game()->id(),
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

    /**
     * Register a new user.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
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

        $user = User::forceCreate([
            ...Arr::except($data, 'ip'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'role_id' => Role::defaultRoleId(),
            'last_login_ip' => $request->input('ip'),
            'last_login_at' => now(),
        ]);

        event(new Registered($user));

        return response()->noContent();
    }

    /**
     * Update the email of the user.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updateEmail(Request $request)
    {
        $this->validate($request, [
            'game_id' => ['required', 'string', 'exists:users,game_id'],
            'email' => ['required', 'string', 'email', 'max:50', 'unique:users'],
        ]);

        $user = User::where('game_id', $request->input('game_id'))->firstOrFail();

        $user->update([
            'email' => $request->input('email'),
            'email_verified_at' => null,
        ]);

        $user->sendEmailVerificationNotification();

        return response()->noContent();
    }

    /**
     * Update the password of the user.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updatePassword(Request $request)
    {
        $this->validate($request, [
            'game_id' => ['required', 'string', 'exists:users,game_id'],
            'password' => ['required', 'string'],
        ]);

        $user = User::where('game_id', $request->input('game_id'))->firstOrFail();

        $user->update([
            'password' => $request->input('password'),
        ]);

        event(new PasswordReset($user));

        return response()->noContent();
    }

    /**
     * Add money to the user.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function addMoney(Request $request, User $user)
    {
        return $this->editMoney($request, $user, function (float $amount) use ($user) {
            $user->increment('money', $amount);
        });
    }

    /**
     * Remove money from the user.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function removeMoney(Request $request, User $user)
    {
        return $this->editMoney($request, $user, function (float $amount) use ($user) {
            $user->decrement('money', min($amount, $user->money));
        });
    }

    /**
     * Change the money of the user.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function setMoney(Request $request, User $user)
    {
        return $this->editMoney($request, $user, function (float $amount) use ($user) {
            $user->update(['money' => $amount]);
        });
    }

    /**
     * Edit the money of the user.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
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

    protected function mapLegacyCommands(Collection $commands): Collection
    {
        return $commands->groupBy('user.name')
            ->map(fn (Collection $group) => $group->pluck('command'));
    }

    protected function mapCommands(Collection $commands): Collection
    {
        return $commands->groupBy('user.name')
            ->map(function (Collection $serverCommands) {
                $user = $serverCommands->first()->user;

                return [
                    'name' => $user->name,
                    'uid' => $user->game_id,
                    'steamid_32' => SteamID::convertTo32((int) $user->game_id),
                    'values' => $serverCommands->pluck('command'),
                ];
            })
            ->values();
    }
}
