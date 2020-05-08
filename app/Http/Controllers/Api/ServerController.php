<?php

namespace Azuriom\Http\Controllers\Api;

use Azuriom\Http\Controllers\Controller;
use Azuriom\Models\Server;
use Azuriom\Models\ServerCommand;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class ServerController extends Controller
{
    public function status()
    {
        return response()->noContent();
    }

    public function fetch(Request $request)
    {
        $server = Server::find($request->input('server-id'));

        $players = Arr::pluck($request->json('players'), 'name', 'uuid');

        $server->updateData([
            'players' => count($players),
            'cpu' => $request->json('system.cpu'),
            'ram' => $request->json('system.ram'),
            'tps' => $request->json('worlds.tps'),
            'loaded_chunks' => $request->json('worlds.chunks'),
            'entities' => $request->json('worlds.entities'),
        ], $request->json('full'));

        $commands = $server->commands()
            ->whereIn('player_name', $players)
            ->orWhere('need_online', false)
            ->get();

        if (! $commands->isEmpty()) {
            ServerCommand::whereIn('id', $commands->modelKeys())->delete();

            $commands = $commands->groupBy('player_name')
                ->map(function ($serverCommands) {
                    return $serverCommands->pluck('command');
                });
        }

        return response()->json(['commands' => $commands]);
    }
}
