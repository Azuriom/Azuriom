<?php

namespace Azuriom\Http\Controllers\Admin;

use Azuriom\Http\Controllers\Controller;
use Azuriom\Models\Ban;
use Azuriom\Models\User;
use Illuminate\Http\Request;

class BanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bans = Ban::withTrashed()->with(['user', 'author'])->paginate(25);

        return view('admin.bans.index')->with('bans', $bans);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Azuriom\Models\User  $user
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request, User $user)
    {
        $this->validate($request, ['reason' => 'required|string|max:250']);

        Ban::create([
            'author_id' => $request->user()->id,
            'user_id' => $user->id,
            'reason' => $request->input('reason')
        ]);

        $user->update(['is_banned' => true]);

        return redirect()->route('admin.users.edit', $user)->with('success', 'User unbanned');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Azuriom\Models\User  $user
     * @param  \Azuriom\Models\Ban  $ban
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(User $user, Ban $ban)
    {
        $ban->delete();

        $user->update(['is_banned' => false]);

        return redirect()->route('admin.users.edit', $user)->with('success', 'User unbanned');
    }
}
