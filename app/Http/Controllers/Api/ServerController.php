<?php

namespace Azuriom\Http\Controllers\Api;

use Azuriom\Http\Controllers\Controller;
use Azuriom\Models\Server;
use Azuriom\Models\ServerCommand;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class ServerController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $header = $request->header('Authorization', '');

            if (! Str::startsWith($header, 'Basic ')) {
                abort(401, 'No server key provided.');
            }

            $token = base64_decode(Str::substr($header, 6));
            $server = Server::where('token', $token)->first();

            if ($server === null) {
                abort(403, 'Invalid server key.');
            }

            $request->merge(['server-id' => $server->id]);

            return $next($request);
        });
    }

    public function status()
    {
        return response()->json(['status' => 'ok']);
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

        ServerCommand::whereIn('id', $commands->pluck('id'))->delete();

        $commands = $commands->groupBy('player_name')
            ->map(function ($serverCommands) {
                return $serverCommands->pluck('command');
            });

        return response()->json([
            'status' => 'ok',
            'commands' => $commands,
        ]);
    }
}
