<?php

namespace Azuriom\Http\Controllers\Admin;

use Azuriom\Http\Controllers\Controller;
use Azuriom\Http\Requests\RoleRequest;
use Azuriom\Models\Permission;
use Azuriom\Models\Role;
use Azuriom\Models\Setting;
use Azuriom\Support\Discord\LinkedRoles;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.roles.index', [
            'roles' => Role::orderByDesc('power')->get(),
            'linkRoles' => setting('discord.link_roles', false),
        ]);
    }

    /**
     * Update the resources order in storage.
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
     * Update the settings for Discord linked roles.
     */
    public function updateSettings(Request $request)
    {
        $validated = $this->validate($request, [
            'client_id' => ['sometimes', 'nullable', 'required_with:link_roles'],
            'client_secret' => ['sometimes', 'nullable', 'required_with:link_roles'],
            'token' => ['sometimes', 'nullable', 'required_with:link_roles'],
        ]);

        $linkRoles = $request->filled('link_roles');

        $validated = [...array_filter($validated), 'link_roles' => $linkRoles];

        try {
            if ($linkRoles) {
                LinkedRoles::registerMetadata(
                    $request->input('client_id'),
                    $request->input('token'),
                );
            }

            Setting::updateSettings(Arr::prependKeysWith($validated, 'discord.'));

            return to_route('admin.roles.index')
                ->with('success', trans('messages.status.success'));
        } catch (Exception $e) {
            return to_route('admin.roles.index')
                ->with('error', trans('messages.status.error', [
                    'error' => $e->getMessage(),
                ]));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.roles.create', [
            'permissions' => Permission::permissionsWithName(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleRequest $request)
    {
        $role = Role::create($request->validated());

        $role->syncPermissions($request->input('permissions', []));

        return to_route('admin.roles.index')
            ->with('success', trans('messages.status.success'));
    }

    /**
     * Show the form for editing the specified resource.
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
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(RoleRequest $request, Role $role)
    {
        $this->authorize('update', $role);

        $user = $request->user();

        if ($user->isAdmin() && $role->is($user->role) && ! $request->input('is_admin')) {
            return to_route('admin.roles.index')
                ->with('error', trans('admin.roles.remove_admin'));
        }

        if (! $user->isAdmin() && ! $role->is_admin && $request->input('is_admin')) {
            return to_route('admin.roles.index')
                ->with('error', trans('admin.roles.add_admin'));
        }

        $role->syncPermissions($request->input('permissions', []));

        $role->update($request->validated());

        return to_route('admin.roles.index')
            ->with('success', trans('messages.status.success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @throws \LogicException
     */
    public function destroy(Role $role)
    {
        $this->authorize('delete', $role);

        if ($role->isDefault()) {
            return to_route('admin.roles.index')
                ->with('error', trans('admin.roles.delete_default'));
        }

        if ($role->is(Auth::user()->role)) {
            return to_route('admin.roles.index')
                ->with('error', trans('admin.roles.delete_own'));
        }

        $role->users()->update(['role_id' => Role::defaultRoleId()]);

        $role->delete();

        return to_route('admin.roles.index')
            ->with('success', trans('messages.status.success'));
    }
}
