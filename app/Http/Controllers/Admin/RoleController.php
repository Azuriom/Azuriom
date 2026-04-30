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
            'groupedPermissions' => Permission::groupedPermissions(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleRequest $request)
    {
        $role = Role::create($request->validated());

        $role->syncPermissions($this->allowedPermissions($request->input('permissions', [])));

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
            'groupedPermissions' => Permission::groupedPermissions(),
            'copySources' => Role::whereKeyNot($role->id)->orderByDesc('power')->get(),
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

        $role->syncPermissions($this->allowedPermissions($request->input('permissions', [])));

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

    /**
     * Copy the permissions of another role into the given role.
     *
     * @throws \Illuminate\Validation\ValidationException
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function copyPermissions(Request $request, Role $role)
    {
        $this->authorize('update', $role);

        $validated = $this->validate($request, [
            'source_role' => ['required', 'integer', 'exists:roles,id', 'not_in:'.$role->id],
            'merge' => ['sometimes', 'boolean'],
        ]);

        $source = Role::with('permissions')->findOrFail($validated['source_role']);

        $permissions = $this->allowedPermissions($source->rawPermissions()->all());

        if ($request->boolean('merge')) {
            $permissions = array_values(array_unique(array_merge($role->rawPermissions()->all(), $permissions)));
        }

        $role->syncPermissions($permissions);

        return to_route('admin.roles.edit', $role)
            ->with('success', trans('admin.roles.permissions_copied', ['role' => $source->name]));
    }

    /**
     * Duplicate the given role with its permissions.
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function duplicate(Role $role)
    {
        $this->authorize('update', $role);

        $role->loadMissing('permissions');

        $copy = $role->replicate(['power']);
        $copy->name = $this->uniqueDuplicateName($role);
        $copy->power = 0;
        $copy->is_admin = false;
        $copy->save();

        $copy->syncPermissions($this->allowedPermissions($role->rawPermissions()->all()));

        return to_route('admin.roles.edit', $copy)
            ->with('success', trans('admin.roles.duplicated', ['role' => $role->name]));
    }

    /**
     * Display the permissions matrix.
     */
    public function matrix()
    {
        $roles = Role::with('permissions')->orderByDesc('power')->get();

        $rolePermissions = $roles->mapWithKeys(
            fn (Role $role) => [$role->id => $role->rawPermissions()->all()],
        );

        return view('admin.roles.matrix', [
            'roles' => $roles,
            'groupedPermissions' => Permission::groupedPermissions(),
            'rolePermissions' => $rolePermissions,
        ]);
    }

    /**
     * Save the permissions matrix.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updateMatrix(Request $request)
    {
        $validated = $this->validate($request, [
            'roles' => ['nullable', 'array'],
            'roles.*' => ['array'],
            'roles.*.*' => ['string'],
        ]);

        $user = $request->user();
        $updated = 0;

        foreach ($validated['roles'] ?? [] as $roleId => $permissions) {
            $role = Role::with('permissions')->find($roleId);

            if ($role === null || $user->cannot('update', $role)) {
                continue;
            }

            $role->syncPermissions($this->allowedPermissions($permissions));

            $updated++;
        }

        return to_route('admin.roles.matrix')
            ->with('success', trans('admin.roles.matrix_updated', ['count' => $updated]));
    }

    /**
     * Filter the given permission names to keep only the registered ones.
     */
    private function allowedPermissions(array $permissions): array
    {
        return array_values(array_intersect($permissions, Permission::permissions()));
    }

    /**
     * Find a unique name for the duplicate of the given role.
     */
    private function uniqueDuplicateName(Role $role): string
    {
        $base = trans('admin.roles.duplicate_name', ['name' => $role->name]);
        $name = $base;
        $i = 2;

        while (Role::where('name', $name)->exists()) {
            $name = $base.' ('.$i++.')';
        }

        return $name;
    }
}
