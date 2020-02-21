<?php

namespace Azuriom\Http\View\Composers;

use Azuriom\Models\Server;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

class ServerComposer
{
    private static $server;

    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        if (Route::is('admin.*')) {
            $view->with('server', Arr::get($view, 'server'));
            return;
        }

        if (self::$server === null) {
            $serverId = setting('default-server');

            if ($serverId) {
                self::$server = Server::find($serverId);
            }
        }

        $view->with('server', self::$server);
    }
}
