<?php

namespace Azuriom\Http\View\Composers;

use Azuriom\Models\Server;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

class ServerComposer
{
    private static ?Collection $servers = null;

    private static ?Server $server = null;

    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        if (Route::is('admin.*') || Route::is('*.admin.*')) {
            $view->with('server', Arr::get($view, 'server'));

            return;
        }

        if (self::$server === null && self::$servers === null) {
            $serverId = (int) setting('servers.default');
            $servers = Server::where('home_display', true)
                ->when($serverId, function (Builder $query) use ($serverId) {
                    $query->orWhere('id', $serverId);
                })
                ->get();

            self::$servers = $servers->where('home_display', true);
            self::$server = $servers->first(fn (Server $server) => $server->id === $serverId);
        }

        $view->with([
            'server' => self::$server,
            'servers' => self::$servers,
        ]);
    }
}
