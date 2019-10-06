<?php

namespace Azuriom\Http\Controllers\Admin;

use Azuriom\Http\Controllers\Controller;
use Azuriom\Http\Requests\RoleRequest;
use Azuriom\Models\Permission;
use Azuriom\Models\Role;
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
        return view('admin.roles.index')->with('roles', Role::paginate(25));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.roles.create')->with('permissions', Permission::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Azuriom\Http\Requests\RoleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request)
    {
        $request->checkbox('is_admin');

        Role::create($request->all());

        return redirect()->route('admin.roles.index')->with('success', 'Role created');
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
        $request->checkbox('is_admin');

        $permissions = array_keys($request->input('permissions', []));

        $role->permissions()->sync($permissions);

        $role->update($request->all());

        return redirect()->route('admin.roles.index')->with('success', 'Role updated');
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
            return redirect()->route('admin.roles.index')->with('error', 'This role cannot be deleted');
        }

        if (Auth::user()->role == $role) {
            return redirect()->route('admin.roles.index')->with('error', 'You cannot delete your role');
        }

        $role->users()->update(['role_id' => 1]);

        $role->delete();

        return redirect()->route('admin.roles.index')->with('success', 'Role deleted');
    }
}
