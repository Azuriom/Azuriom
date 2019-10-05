<?php

namespace Azuriom\Http\Controllers\Admin;

use Azuriom\Http\Controllers\Controller;
use Azuriom\Http\Requests\UserRequest;
use Azuriom\Models\ActionLog;
use Azuriom\Models\Role;
use Azuriom\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.index')->with('users', User::paginate(25));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create')->with('roles', Role::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Azuriom\Http\Requests\UserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $role = Role::findOrFail($request->input('role'));

        $request->offsetSet('password', Hash::make($request->input('password')));

        $user = new User($request->all());
        $user->role()->associate($role);
        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'User created');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Azuriom\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', [
            'user' => $user,
            'roles' => Role::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Azuriom\Http\Requests\UserRequest  $request
     * @param  \Azuriom\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
        $user->fill($request->except(['password']));

        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        $role = Role::findOrFail($request->input('role'));

        $user->role()->associate($role);
        $user->save();

        ActionLog::logUpdate($user);

        return redirect()->route('admin.users.index')->with('success', 'User updated');
    }

    public function verifyEmail(User $user)
    {
        $user->markEmailAsVerified();

        ActionLog::logUpdate($user);

        return redirect()->route('admin.users.edit', $user)->with('success', 'Email verified');
    }

    public function disable2fa(User $user)
    {
        $user->update(['google_2fa_secret' => null]);

        ActionLog::logUpdate($user);

        return redirect()->route('admin.users.edit', $user)->with('success', '2fa disabled');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Azuriom\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        return redirect()->route('admin.users.index')->with('error', 'Not implemented yet !');
    }
}
