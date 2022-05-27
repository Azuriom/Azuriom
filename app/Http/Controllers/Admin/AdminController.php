<?php

namespace Azuriom\Http\Controllers\Admin;

use Azuriom\Extensions\UpdateManager;
use Azuriom\Http\Controllers\Controller;
use Azuriom\Models\Image;
use Azuriom\Models\Page;
use Azuriom\Models\Post;
use Azuriom\Models\User;
use Azuriom\Support\Charts;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * The application instance.
     *
     * @var \Illuminate\Contracts\Foundation\Application
     */
    private $app;

    /**
     * Create a new controller instance.
     *
     * @param  \Illuminate\Contracts\Foundation\Application  $app
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function index(Request $request)
    {
        $updates = $this->app->make(UpdateManager::class);
        $newVersion = $updates->hasUpdate() ? $updates->getLastVersion() : null;

        return view('admin.dashboard', [
            'secure' => $request->secure() || ! $this->app->isProduction(),
            'userCount' => User::whereNull('deleted_at')->count(),
            'postCount' => Post::count(),
            'pageCount' => Page::count(),
            'imageCount' => Image::count(),
            'newUsersPerMonths' => Charts::countByMonths(User::whereNull('deleted_at')),
            'newUsersPerDays' => Charts::countByDays(User::whereNull('deleted_at')),
            'activeUsers' => $this->getActiveUsers(),
            'newVersion' => $newVersion,
            'apiAlerts' => $updates->getApiAlerts(),
        ]);
    }

    public function fallback()
    {
        return response()->view('admin.errors.404', [], 404);
    }

    protected function getActiveUsers()
    {
        $condition = match (config('database.default')) {
            'sqlsrv' => 'DATEDIFF(day, [last_login_at], GETDATE())',
            'pgsql' => 'NOW()::date - last_login_at::date',
            'sqlite' => 'julianday() - julianday(last_login_at)',
            default => 'DATEDIFF(NOW(), last_login_at)', // mysql
        };
        /*
        * query structure :
        * 1 : last_login_at whitin a day
        * 2 : last_login_at whitin a week but not the first day of the week
        * 3 : last_login_at whitin a month but not the first week of the month
        * 4 : last_login_at more than a month
        */
        $query = <<<LINE
        COUNT(CASE WHEN {$condition} < 2 then 1 ELSE NULL END) as "1",
        COUNT(CASE WHEN {$condition} > 1 AND {$condition} < 8 then 1 ELSE NULL END) as "7",
        COUNT(CASE WHEN {$condition} > 7 AND {$condition} < 32 then 1 ELSE NULL END) as "31",
        COUNT(CASE WHEN  {$condition} > 31 then 1 ELSE NULL END) as "+1 month"
        LINE;

        return (array) DB::table('users')->select(DB::raw($query))->whereNotNull('last_login_at')->first();
    }
}
