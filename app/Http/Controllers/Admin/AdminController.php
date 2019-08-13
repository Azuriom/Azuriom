<?php

namespace App\Http\Controllers\Admin;

use App\Models\Page;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index() {
        return view('admin.dashboard')->with([
            'userCount' => User::count(),
            'postCount' => Post::count(),
            'pageCount' => Page::count()
        ]);
    }
}
