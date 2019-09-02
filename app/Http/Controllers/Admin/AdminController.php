<?php

namespace Azuriom\Http\Controllers\Admin;

use Azuriom\Http\Controllers\Controller;
use Azuriom\Models\Image;
use Azuriom\Models\Page;
use Azuriom\Models\Post;
use Azuriom\Models\User;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'userCount' => User::count(),
            'postCount' => Post::count(),
            'pageCount' => Page::count(),
            'imageCount' => Image::count(),
            'recentUsers' => $this->getRecentUsers()
        ]);
    }

    protected function getRecentUsers()
    {
        $carbon = Carbon::now();
        $month = $carbon->month;
        $recentUsers = [];

        $queryUsers = User::query()
            ->whereDate('created_at', '>=', $carbon->subMonths(6))
            ->get(['id', 'created_at'])
            ->groupBy(function (User $user) {
                return $user->created_at->format('Y-m');
            })->transform(function ($data) {
                return count($data);
            });

        while ($carbon->month < $month) {
            $carbon->addMonth();
            $time = $carbon->format('Y-m');

            $recentUsers[$time] = $queryUsers->get($time, 0);
        }

        return $recentUsers;
    }
}
