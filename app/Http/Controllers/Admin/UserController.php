<?php

namespace Azuriom\Http\Controllers\Admin;

use Azuriom\Http\Controllers\Controller;
use Azuriom\Http\Requests\UserRequest;
use Azuriom\Models\ActionLog;
use Azuriom\Models\Role;
use Azuriom\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $users = User::with('ban')
            ->when($search, function (Builder $query, string $search) {
                $query->where('email', 'LIKE', "%{$search}%")
                    ->orWhere('name', 'LIKE', "%{$search}%")
                    ->orWhere('game_id', 'LIKE', "%{$search}%");

                if (is_numeric($search)) {
                    $query->orWhere('id', $search);
                }
            })->paginate();

        foreach ($users as $user) {
            $user->refreshActiveBan();
        }

        return view('admin.users.index', [
            'users' => $users,
            'search' => $search,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create', ['roles' => Role::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Azuriom\Http\Requests\UserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $role = Role::find($request->input('role'));
        $passwordHash = Hash::make($request->input('password'));

        $user = new User(['password' => $passwordHash] + $request->validated());
        $user->role()->associate($role);
        $user->save();

        return redirect()->route('admin.users.index')->with('success', trans('admin.users.status.created'));
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
            'user' => $user->refreshActiveBan(),
            'roles' => Role::all(),
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
        if ($user->is_deleted) {
            return redirect()->back();
        }

        $user->fill(Arr::except($request->validated(), 'password'));

        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        $role = Role::find($request->input('role'));

        $user->role()->associate($role);
        $user->save();

        ActionLog::log('users.updated', $user);

        return redirect()->route('admin.users.index')->with('success', trans('admin.users.status.updated'));
    }

    public function verifyEmail(User $user)
    {
        if ($user->is_deleted) {
            return redirect()->back();
        }

        $user->markEmailAsVerified();

        ActionLog::log('users.updated', $user);

        return redirect()->route('admin.users.edit', $user)
            ->with('success', trans('admin.users.status.email-verified'));
    }

    public function disable2fa(User $user)
    {
        $user->update(['google_2fa_secret' => null]);

        ActionLog::log('users.updated', $user);

        return redirect()->route('admin.users.edit', $user)->with('success', trans('admin.users.status.2fa-disabled'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Azuriom\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if ($user->is_deleted || $user->isAdmin()) {
            return redirect()->back();
        }

        $user->comments()->delete();
        $user->likes()->delete();

        $user->fill([
            'name' => 'Deleted #'.$user->id,
            'email' => 'deleted'.$user->id.'@deleted.ltd',
            'password' => Hash::make(Str::random()),
            'role_id' => 1,
            'game_id' => null,
            'access_token' => null,
            'google_2fa_secret' => null,
        ]);

        $user->email_verified_at = null;
        $user->last_login_ip = null;
        $user->is_deleted = true;

        $user->setRememberToken(null);
        $user->save();

        ActionLog::log('user.deleted', $user);

        return redirect()->route('admin.users.index', $user)->with('success', trans('admin.users.status.deleted'));
    }
}
