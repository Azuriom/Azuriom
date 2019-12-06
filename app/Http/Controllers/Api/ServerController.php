<?php

namespace Azuriom\Http\Controllers\Api;

use Azuriom\Http\Controllers\Controller;
use Azuriom\Models\Server;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServerController extends Controller
{
    /**
     * Create a new ServerController instance.
     */
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $header = $request->header('Authorization', '');

            if (! Str::startsWith($header, 'Basic ')) {
                return response()->json(['status' => 'error', 'message' => 'No key']);
            }

            $token = base64_decode(Str::substr($header, 6));
            $server = Server::where('token', $token)->first();

            if ($server === null) {
                return response()->json(['status' => 'error', 'message' => 'Invalid key']);
            }

            $request->merge(['server-id' => $server->id]);

            return $next($request);
        });
    }

    public function status()
    {
        return response()->json(['status' => 'ok',]);
    }

    public function fetch(Request $request)
    {
        $server = Server::findOrFail($request->input('server-id'));

        $data = $request->json();

        $server->updateData($data);

        return response()->json(['status' => 'ok',]);
    }
}
