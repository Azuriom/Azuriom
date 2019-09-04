<?php

namespace Azuriom\Http\Controllers\Admin;

use Azuriom\Http\Controllers\Controller;
use Azuriom\Models\Permission;
use Azuriom\Models\Role;
use Azuriom\Rules\Color;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::paginate(25);

        return view('admin.roles.index')->with('roles', $roles);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->rules());

        $request->offsetSet('color', substr($request->get('color'), 1));

        request_checkbox($request, 'is_admin');

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
     * @param  \Illuminate\Http\Request  $request
     * @param  \Azuriom\Models\Role  $role
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, Role $role)
    {
        $this->validate($request, $this->rules());

        $request->offsetSet('color', substr($request->get('color'), 1));

        request_checkbox($request, 'is_admin');

        $permissions = array_keys($request->get('permissions', []));

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

        if (auth()->user()->role == $role) {
            return redirect()->route('admin.roles.index')->with('error', 'You cannot delete your role');
        }

        $role->users()->update(['role_id' => 1]);

        $role->delete();

        return redirect()->route('admin.roles.index')->with('success', 'Role deleted');
    }

    private function rules()
    {
        return [
            'name' => ['required', 'string', 'max:25'],
            'color' => ['required', new Color],
        ];
    }
}
