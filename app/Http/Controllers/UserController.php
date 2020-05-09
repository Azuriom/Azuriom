<?php

namespace Azuriom\Http\Controllers;

use Azuriom\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Find the users with the specified name.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function search(Request $request)
    {
        $name = $request->input('q');

        return User::where('name', 'LIKE', '%'.$name.'%')->get(['id', 'name']);
    }
}
