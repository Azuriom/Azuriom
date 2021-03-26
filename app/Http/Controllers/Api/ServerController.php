<?php

namespace Azuriom\Http\Controllers\Api;

use Azuriom\Http\Controllers\Controller;
use Azuriom\Models\Server;
use Azuriom\Models\ServerCommand;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

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

        $commands = $server->commands()
            ->whereIn('player_name', $players)
            ->orWhere('need_online', false)
            ->limit(100)
            ->get();

        if (! $commands->isEmpty()) {
            ServerCommand::whereIn('id', $commands->modelKeys())->delete();

            $commands = $commands->groupBy('player_name')
                ->map(function (Collection $serverCommands) {
                    return $serverCommands->pluck('command');
                });
        }

        return response()->json([
            'commands' => $commands,
            'retry' => $commands->count() > 100,
        ]);
    }
}
