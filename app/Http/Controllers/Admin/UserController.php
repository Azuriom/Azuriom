<?php

namespace Azuriom\Http\Controllers\Admin;

use Azuriom\Http\Controllers\Controller;
use Azuriom\Http\Requests\UserRequest;
use Azuriom\Models\ActionLog;
use Azuriom\Models\Role;
use Azuriom\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

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
            ->whereNull('deleted_at')
            ->when($search, function (Builder $query, string $search) {
                $query->scopes(['search' => $search]);
            })->paginate();

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
        return view('admin.users.create', [
            'roles' => Role::orderByDesc('power')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Azuriom\Http\Requests\UserRequest  $request
     * @return \Illuminate\Http\Response
     *
     * @throws \Illuminate\Validation\ValidationException;
     */
    public function store(UserRequest $request)
    {
        $role = Role::find($request->input('role'));

        $this->validateRole($request->user(), $role);

        $passwordHash = Hash::make($request->input('password'));

        $user = new User(['password' => $passwordHash] + $request->validated());
        $user->role()->associate($role);
        $user->save();

        return redirect()->route('admin.users.index')->with('success', trans('messages.status.success'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Azuriom\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $logs = ActionLog::with('target')
            ->where('user_id', $user->id)
            ->latest()
            ->paginate();

        return view('admin.users.edit', [
            'user' => $user->load('ban'),
            'roles' => Role::orderByDesc('power')->get(),
            'logs' => $logs,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Azuriom\Http\Requests\UserRequest  $request
     * @param  \Azuriom\Models\User  $user
     * @return \Illuminate\Http\Response
     *
     * @throws \Illuminate\Validation\ValidationException;
     */
    public function update(UserRequest $request, User $user)
    {
        if ($user->isDeleted()) {
            return redirect()->back();
        }

        $user->fill(Arr::except($request->validated(), 'password'));

        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        $role = Role::find($request->input('role'));

        $this->validateRole($request->user(), $role, $user);

        $user->role()->associate($role);
        $user->save();

        if ($user->wasChanged('password')) {
            event(new PasswordReset($user));
        }

        ActionLog::log('users.updated', $user);

        return redirect()->route('admin.users.index')->with('success', trans('messages.status.success'));
    }

    public function verifyEmail(User $user)
    {
        if ($user->isDeleted()) {
            return redirect()->back();
        }

        $user->markEmailAsVerified();

        ActionLog::log('users.updated', $user);

        return redirect()->route('admin.users.edit', $user)
            ->with('success', trans('admin.users.email.verify_success'));
    }

    public function disable2fa(User $user)
    {
        $user->update(['two_factor_secret' => null]);

        ActionLog::log('users.updated', $user);

        return redirect()->route('admin.users.edit', $user)->with('success', trans('admin.users.2fa.disabled'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Azuriom\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if ($user->isDeleted() || $user->isAdmin()) {
            return redirect()->back();
        }

        $user->setDeleted();

        ActionLog::log('users.deleted', $user);

        return redirect()->route('admin.users.index', $user)->with('success', trans('messages.status.success'));
    }

    protected function validateRole(User $user, Role $role, User $target = null)
    {
        if (($target && $user->role->power < $target->role->power) || (! $user->isAdmin() && $user->role->power < $role->power)) {
            throw ValidationException::withMessages([
                'role_id' => trans('admin.roles.unauthorized'),
            ]);
        }
    }
}
