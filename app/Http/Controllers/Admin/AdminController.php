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

class AdminController extends Controller
{
    /**
     * The application instance.
     *
     * @var \Illuminate\Contracts\Foundation\Application
     */
    private Application $app;

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
        $userCount = User::whereNull('deleted_at')->count();

        return view('admin.dashboard', [
            'secure' => $request->secure() || ! $this->app->isProduction(),
            'userCount' => $userCount,
            'postCount' => Post::count(),
            'pageCount' => Page::count(),
            'imageCount' => Image::count(),
            'newUsersPerMonths' => Charts::countByMonths(User::whereNull('deleted_at')),
            'newUsersPerDays' => Charts::countByDays(User::whereNull('deleted_at')),
            'activeUsers' => $this->getActiveUsers($userCount),
            'newVersion' => $newVersion,
            'apiAlerts' => $updates->getApiAlerts(),
        ]);
    }

    public function fallback()
    {
        return response()->view('admin.errors.404', [], 404);
    }

    protected function getActiveUsers(int $totalUsers)
    {
        $column = 'last_login_at';

        $dayUsers = User::where($column, '>', now()->subDay())->count();
        $weekUsers = User::where($column, '>', now()->subWeek())->count() - $dayUsers;
        $monthUsers = User::where($column, '>', now()->subMonth())->count() - $weekUsers;

        $dayTrans = now()->subDay()->longAbsoluteDiffForHumans();
        $weekTrans = now()->subWeek()->longAbsoluteDiffForHumans();
        $monthTrans = now()->subMonth()->longAbsoluteDiffForHumans();

        return [
            $dayTrans => $dayUsers,
            $weekTrans => $weekUsers,
            $monthTrans => $monthUsers,
            '+ '.$monthTrans => $totalUsers - $monthUsers,
        ];
    }
}
