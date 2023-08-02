<?php

namespace Azuriom\Http\Controllers;

use Azuriom\Http\Resources\UserResource;
use Azuriom\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Find the users with the specified name.
     */
    public function search(Request $request)
    {
        $name = $request->input('q');

        $users = User::search($name, 'name')->with('role')->get();

        return UserResource::collection($users);
    }
}
