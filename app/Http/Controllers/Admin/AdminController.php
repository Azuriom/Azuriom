<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Post;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard')->with([
            'userCount' => User::count(),
            'postCount' => Post::count(),
            'pageCount' => Page::count()
        ]);
    }
}
