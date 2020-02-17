<?php

namespace Azuriom\Http\Controllers\Admin;

use Azuriom\Extensions\UpdateManager;
use Azuriom\Http\Controllers\Controller;
use Azuriom\Models\Image;
use Azuriom\Models\Page;
use Azuriom\Models\Post;
use Azuriom\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Request;

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
        $apiAlerts = $updates->getApiAlerts();

        return view('admin.dashboard', [
            'secure' => $request->secure() || ! $this->app->isProduction(),
            'userCount' => User::count(),
            'postCount' => Post::count(),
            'pageCount' => Page::count(),
            'imageCount' => Image::count(),
            'recentUsers' => $this->getRecentUsers(),
            'activeUsers' => $this->getActiveUsers(),
            'newVersion' => $newVersion,
            'apiAlerts' => $apiAlerts,
        ]);
    }

    public function fallback()
    {
        return response()->view('admin.errors.404', [], 404);
    }

    protected function getRecentUsers()
    {
        $date = now()->subMonths(6);
        $recentUsers = [];

        $queryUsers = User::whereDate('created_at', '>=', $date)
            ->get(['id', 'created_at'])
            ->countBy(function ($user) {
                return $user->created_at->translatedFormat('M Y');
            });

        for ($i = 0; $i < 6; $i++) {
            $date->addMonth();
            $time = $date->translatedFormat('M Y');

            $recentUsers[$time] = $queryUsers->get($time, 0);
        }

        return collect($recentUsers);
    }

    protected function getActiveUsers()
    {
        $days = [1, 7, 31];

        $users = collect([
            1 => 0,
            7 => 0,
            31 => 0,
        ]);

        User::whereDate('last_login_at', '>=', now()->subMonth())
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
