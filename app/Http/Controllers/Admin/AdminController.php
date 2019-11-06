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
            'secure' => $request->secure() || $this->app->isLocal(),
            'userCount' => User::count(),
            'postCount' => Post::count(),
            'pageCount' => Page::count(),
            'imageCount' => Image::count(),
            'recentUsers' => $this->getRecentUsers()
        ]);
    }

    protected function getRecentUsers()
    {
        $date = now();
        $month = $date->month;
        $recentUsers = [];

        $queryUsers = User::whereDate('created_at', '>=', $date->subMonths(6))
            ->get(['id', 'created_at'])
            ->groupBy(function (User $user) {
                return $user->created_at->format('M Y');
            })->transform(function ($data) {
                return count($data);
            });

        while ($date->month < $month) {
            $date->addMonth();
            $time = $date->format('M Y');

            $recentUsers[$time] = $queryUsers->get($time, 0);
        }

        return $recentUsers;
    }
}
