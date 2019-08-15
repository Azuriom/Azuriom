<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
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
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->rules());

        $user = new User($request->except('password'));
        $user->password = Hash::make($request->get('password'));
        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'User created');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.users.edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request, $this->rules($user));

        $user->fill($request->except('password'));

        if ($request->get('password')) {
            $user->password = Hash::make($request->get('password'));
        }

        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'User updated');
    }

    public function verifyEmail(User $user)
    {
        $user->markEmailAsVerified();
        $user->save();

        return redirect()->route('admin.users.edit', $user)->with('user', $user)->with('success', 'Email verified');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        return redirect()->route('admin.users.index')->with('error', 'Not implemented yet !');
    }

    protected function rules($user = null)
    {
        return [
            'name' => ['required', 'string', 'max:25'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user, 'email')],
            'password' => [$user != null ? 'nullable' : 'required', 'string', 'min:8'],
        ];
    }
}
