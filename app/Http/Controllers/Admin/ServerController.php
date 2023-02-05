<?php

namespace Azuriom\Http\Controllers\Admin;

use Azuriom\Http\Controllers\Controller;
use Azuriom\Http\Requests\ServerRequest;
use Azuriom\Models\Server;
use Azuriom\Models\Setting;
use Exception;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use RuntimeException;

class ServerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.servers.index', [
            'servers' => Server::with('stat')->get(),
            'defaultServerId' => (int) setting('servers.default'),
        ]);
    }

    /**
     * Change the default server.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function changeDefault(Request $request)
    {
        $this->validate($request, [
            'server' => ['nullable', Rule::exists('servers', 'id')],
        ]);

        Setting::updateSettings('servers.default', $request->input('server'));

        return redirect()->route('admin.servers.index')
            ->with('success', trans('messages.status.success'));
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
        try {
            $server = new Server(array_merge($request->validated(), [
                'token' => Str::random(32),
            ]));

            if (! $server->bridge()->verifyLink()) {
                throw new RuntimeException('Unable to connect to the server');
            }
        } catch (Exception $e) {
            return redirect()->back()->withInput()
                ->with('error', trans('admin.servers.error', [
                    'error' => $e->getMessage(),
                ]));
        }

        $server->save();

        if (Server::count() === 1) {
            Setting::updateSettings('servers.default', $server->id);
        }

        if ($request->input('redirect') === 'edit') {
            return redirect()->route('admin.servers.edit', $server);
        }

        return redirect()->route('admin.servers.index')
            ->with('success', trans('messages.status.success'));
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
                throw new RuntimeException('Unable to connect to the server');
            }
        } catch (Exception $e) {
            return redirect()->back()->withInput()
                ->with('error', trans('admin.servers.error', [
                    'error' => $e->getMessage(),
                ]));
        }
        $server->save();

        return redirect()->route('admin.servers.index')
            ->with('success', trans('messages.status.success'));
    }

    public function verifyAzLink(ServerRequest $request, Server $server)
    {
        if ($server->type !== 'mc-azlink') {
            return response()->json([
                'message' => 'This server isn\'t using AzLink',
            ], 422);
        }

        $server->fill($request->validated());

        try {
            $response = $server->bridge()->sendServerRequest();

            if (! $response->successful()) {
                return response()->json([
                    'message' => trans('admin.servers.azlink.badresponse', [
                        'code' => $response->status(),
                    ]),
                ], 422);
            }

            return response()->json([
                'message' => trans('admin.servers.connected'),
            ]);
        } catch (ConnectionException) {
            return response()->json([
                'message' => trans('admin.servers.azlink.error'),
            ], 422);
        } catch (Exception $e) {
            return response()->json([
                'message' => trans('messages.status.error', ['error' => $e->getMessage()]),
            ], 422);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Azuriom\Models\Server  $server
     * @return \Illuminate\Http\Response
     *
     * @throws \Exception
     */
    public function destroy(Server $server)
    {
        $server->delete();

        return redirect()->route('admin.servers.index')
            ->with('success', trans('messages.status.success'));
    }
}
