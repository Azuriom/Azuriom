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
        return view('admin.roles.index', ['roles' => Role::orderByDesc('power')->get()]);
    }

    /**
     * Update the resources order in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updatePower(Request $request)
    {
        $this->validate($request, [
            'roles' => ['required', 'array'],
        ]);

        $roles = $request->input('roles');

        $position = 1;

        foreach ($roles as $roleId) {
            Role::whereKey($roleId)->update(['power' => $position++]);
        }

        return $request->expectsJson() ? response()->json([
            'status' => 'success',
            'message' => trans('admin.roles.status.power-updated')
        ]) : redirect()->route('admin.roles.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.roles.create', ['permissions' => Permission::all()]);
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

        $permissions = array_keys($request->input('permissions', []));

        $role->permissions()->sync($permissions);

        return redirect()->route('admin.roles.index')->with('success', trans('admin.roles.status.created'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Azuriom\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $role->loadMissing('permissions');

        return view('admin.roles.edit', [
            'role' => $role,
            'permissions' => Permission::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Azuriom\Http\Requests\RoleRequest  $request
     * @param  \Azuriom\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(RoleRequest $request, Role $role)
    {
        $permissions = array_keys($request->input('permissions', []));

        $role->permissions()->sync($permissions);

        $role->update($request->validated());

        return redirect()->route('admin.roles.index')->with('success', trans('admin.roles.status.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Azuriom\Models\Role  $role
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Role $role)
    {
        if ($role->isPermanent()) {
            return redirect()->route('admin.roles.index')->with('error', trans('admin.roles.status.permanent-role'));
        }

        if (Auth::user()->role == $role) {
            return redirect()->route('admin.roles.index')->with('error', trans('admin.roles.status.own-role'));
        }

        $role->users()->update(['role_id' => 1]);

        $role->delete();

        return redirect()->route('admin.roles.index')->with('success', trans('admin.roles.status.deleted'));
    }
}
