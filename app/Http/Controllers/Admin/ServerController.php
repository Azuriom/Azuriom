<?php

namespace Azuriom\Http\Controllers\Admin;

use Azuriom\Http\Controllers\Controller;
use Azuriom\Http\Requests\ServerRequest;
use Azuriom\Models\Server;
use Exception;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Exception\ConnectException;
use Illuminate\Support\Str;
use Throwable;

class ServerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.servers.index', ['servers' => Server::with('stat')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.servers.create', ['types' => Server::types()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Azuriom\Http\Requests\ServerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServerRequest $request)
    {
        $server = new Server($request->validated() + ['token' => Str::random(32)]);

        try {
            if (! $server->bridge()->verifyLink()) {
                throw new Exception('Unable to connect to the server');
            }
        } catch (Throwable $t) {
            return redirect()->back()->withInput()->with('error', trans('admin.servers.status.connect-error', [
                'error' => utf8_encode($t->getMessage()),
            ]));
        }

        $server->save();

        if ($request->input('redirect') === 'edit') {
            return redirect()->route('admin.servers.edit', $server);
        }

        return redirect()->route('admin.servers.index')->with('success', trans('admin.servers.status.created'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Azuriom\Models\Server  $server
     * @return \Illuminate\Http\Response
     */
    public function edit(Server $server)
    {
        return view('admin.servers.edit', [
            'server' => $server,
            'types' => Server::types(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Azuriom\Http\Requests\ServerRequest  $request
     * @param  \Azuriom\Models\Server  $server
     * @return \Illuminate\Http\Response
     */
    public function update(ServerRequest $request, Server $server)
    {
        $server->fill($request->validated());

        try {
            if (! $server->bridge()->verifyLink()) {
                throw new Exception('Unable to connect to the server');
            }
        } catch (Throwable $t) {
            return redirect()->back()->withInput()->with('error', trans('admin.servers.status.connect-error', [
                'error' => utf8_encode($t->getMessage()),
            ]));
        }
        $server->save();

        return redirect()->route('admin.servers.index')->with('success', trans('admin.servers.status.updated'));
    }

    public function verifyAzLink(ServerRequest $request, Server $server)
    {
        if ($server->type !== 'mc-azlink') {
            return response()->json(['status' => 'error', 'message' => trans('admin.servers.status.not-azlink')], 422);
        }

        $server->fill($request->validated());

        try {
            $server->bridge()->sendServerRequest();

            return response()->json([
                'status' => 'success', 'message' => trans('admin.servers.status.connect-success'),
            ]);
        } catch (Throwable $t) {
            if ($t instanceof ConnectException) {
                return response()->json([
                    'status' => 'error',
                    'message' => trans('admin.servers.status.azlink-connect'),
                ], 422);
            }

            if ($t instanceof BadResponseException) {
                return response()->json([
                    'status' => 'error',
                    'message' => trans('admin.servers.status.azlink-badresponse', [
                        'code' => $t->getResponse()->getStatusCode(),
                    ]),
                ], 422);
            }

            return response()->json(['status' => 'error', 'message' => $t->getMessage()], 422);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Azuriom\Models\Server  $server
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Server $server)
    {
        $server->delete();

        return redirect()->route('admin.servers.index')->with('success', trans('admin.servers.status.deleted'));
    }
}
