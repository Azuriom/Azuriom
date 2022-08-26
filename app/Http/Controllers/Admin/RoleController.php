<?php

namespace Azuriom\Http\Controllers\Admin;

use Azuriom\Http\Controllers\Controller;
use Azuriom\Http\Requests\RoleRequest;
use Azuriom\Models\Permission;
use Azuriom\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.roles.index', [
            'roles' => Role::orderByDesc('power')->get(),
        ]);
    }

    /**
     * Update the resources order in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
     * @throws \Illuminate\Validation\ValidationException
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function updatePower(Request $request)
    {
        $this->authorize('admin.admin');

        $this->validate($request, [
            'roles' => ['required', 'array'],
        ]);

        $roles = $request->input('roles');

        $position = 1;

        foreach ($roles as $roleId) {
            Role::whereKey($roleId)->update(['power' => $position++]);
        }

        return response()->json([
            'message' => trans('admin.roles.updated'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.roles.create', [
            'permissions' => Permission::permissionsWithName(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Azuriom\Http\Requests\RoleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request)
    {
        $role = Role::create($request->validated());

        $role->syncPermissions($request->input('permissions', []));

        return redirect()->route('admin.roles.index')
            ->with('success', trans('messages.status.success'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Azuriom\Models\Role  $role
     * @return \Illuminate\Http\Response
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Role $role)
    {
        $this->authorize('update', $role);

        $role->loadMissing('permissions');

        return view('admin.roles.edit', [
            'role' => $role,
            'permissions' => Permission::permissionsWithName(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Azuriom\Http\Requests\RoleRequest  $request
     * @param  \Azuriom\Models\Role  $role
     * @return \Illuminate\Http\Response
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(RoleRequest $request, Role $role)
    {
        $this->authorize('update', $role);

        $user = $request->user();

        if ($user->isAdmin() && $role->is($user->role) && ! $request->input('is_admin')) {
            return redirect()->route('admin.roles.index')
                ->with('error', trans('admin.roles.remove_admin'));
        }

        if (! $user->isAdmin() && ! $role->is_admin && $request->input('is_admin')) {
            return redirect()->route('admin.roles.index')
                ->with('error', trans('admin.roles.add_admin'));
        }

        $role->syncPermissions($request->input('permissions', []));

        $role->update($request->validated());

        return redirect()->route('admin.roles.index')
            ->with('success', trans('messages.status.success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Azuriom\Models\Role  $role
     * @return \Illuminate\Http\Response
     *
     * @throws \Exception
     */
    public function destroy(Role $role)
    {
        $this->authorize('delete', $role);

        if ($role->isDefault()) {
            return redirect()->route('admin.roles.index')
                ->with('error', trans('admin.roles.delete_default'));
        }

        if ($role->is(Auth::user()->role)) {
            return redirect()->route('admin.roles.index')
                ->with('error', trans('admin.roles.delete_own'));
        }

        $role->users()->update(['role_id' => Role::defaultRoleId()]);

        $role->delete();

        return redirect()->route('admin.roles.index')
            ->with('success', trans('messages.status.success'));
    }
}
