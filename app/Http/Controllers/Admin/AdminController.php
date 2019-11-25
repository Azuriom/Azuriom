<?php

namespace Azuriom\Http\Controllers\Admin;

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
     * AdminController constructor.
     *
     * @param  \Illuminate\Contracts\Foundation\Application  $app
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function index(Request $request)
    {
        return view('admin.dashboard', [
            'secure' => $request->secure() || ! $this->app->isProduction(),
            'userCount' => User::count(),
            'postCount' => Post::count(),
            'pageCount' => Page::count(),
            'imageCount' => Image::count(),
            'recentUsers' => $this->getRecentUsers(),
            'activeUsers' => $this->getActiveUsers()
        ]);
    }

    protected function getRecentUsers()
    {
        $date = now()->subMonths(6);
        $recentUsers = [];

        $queryUsers = User::whereDate('created_at', '>=', $date)
            ->get(['id', 'created_at'])
            ->countBy(function ($user) {
                return $user->created_at->format('M Y');
            });

        for ($i = 0; $i < 6; $i++) {
            $date->addMonth();
            $time = $date->format('M Y');

            $recentUsers[$time] = $queryUsers->get($time, 0);
        }

        return $recentUsers;
    }

    protected function getActiveUsers()
    {
        $recentUsers = [
            1 => 0,
            7 => 0,
            30 => 0,
            '+' => 0,
        ];

        User::whereDate('last_login_at', '>=', now()->subMonth())
            ->get(['id', 'last_login_at'])
            ->each(function ($user) use (&$recentUsers) {
                $diff = $user->last_login_at->diffInDays();

                foreach ($recentUsers as $time => $count) {
                    if ($time !== '+' && $diff <= $time) {
                        $recentUsers[$time]++;
                        break;
                    }
                }
            });

        $recentUsers['+'] = User::whereDate('last_login_at', '<', now()->subMonth())->count();

        return $recentUsers;
    }
}
