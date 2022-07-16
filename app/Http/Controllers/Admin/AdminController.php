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
        $days = [1, 7, 31];

        $users = collect([
            1 => 0,
            7 => 0,
            31 => 0,
        ]);

        User::where('last_login_at', '>=', now()->subMonth())
            ->without('role')
            ->get(['id', 'last_login_at'])
            ->each(function ($user) use ($days, $users) {
                $diff = $user->last_login_at->diffInDays();

                foreach ($days as $time) {
                    if ($diff <= $time) {
                        $users->put($time, $users->get($time, 0) + 1);
                        break;
                    }
                }
            });

        $users = $users->mapWithKeys(function ($value, $key) {
            $time = now()->subDays($key)->longAbsoluteDiffForHumans();

            return [$time => $value];
        });

        $oldUsers = User::whereDate('last_login_at', '<', now()->subMonth())->count();
        $users->put('+ '.now()->subMonth()->longAbsoluteDiffForHumans(), $oldUsers);

        return $users;
    }
}
