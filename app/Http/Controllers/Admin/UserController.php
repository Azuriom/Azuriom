<?php

namespace Azuriom\Http\Controllers\Admin;

use Azuriom\Http\Controllers\Controller;
use Azuriom\Models\ActionLog;
use Azuriom\Models\Role;
use Azuriom\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(25);

        return view('admin.users.index')->with('users', $users);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->rules());

        $role = Role::findOrFail($request->input('role'));

        $request->offsetSet('password', Hash::make($request->input('password')));

        $user = new User($request->all());
        $user->role()->associate($role);
        $user->save();

        ActionLog::logCreate($user);

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
     * @param  \Illuminate\Http\Request  $request
     * @param  \Azuriom\Models\User  $user
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request, $this->rules($user));

        $user->fill($request->except(['password']));

        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        $role = Role::findOrFail($request->input('role'));

        $user->role()->associate($role);
        $user->save();

        ActionLog::logEdit($user);

        return redirect()->route('admin.users.index')->with('success', 'User updated');
    }

    public function verifyEmail(User $user)
    {
        $user->markEmailAsVerified();

        ActionLog::logEdit($user);

        return redirect()->route('admin.users.edit', $user)->with('success', 'Email verified');
    }

    public function disable2fa(User $user)
    {
        $user->update(['google_2fa_secret' => null]);

        ActionLog::logEdit($user);

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

    private function rules($user = null)
    {
        return [
            'name' => ['required', 'string', 'max:25', 'alpha_dash', Rule::unique('users')->ignore($user, 'name')],
            'email' => ['required', 'string', 'email', 'max:50', Rule::unique('users')->ignore($user, 'email')],
            'password' => [($user !== null ? 'nullable' : 'required'), 'string', 'min:8'],
            'role' => ['required', 'integer', 'exists:roles,id']
        ];
    }
}
