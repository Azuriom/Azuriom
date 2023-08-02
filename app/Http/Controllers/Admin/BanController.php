<?php

namespace Azuriom\Http\Controllers\Admin;

use Azuriom\Http\Controllers\Controller;
use Azuriom\Http\Requests\BanRequest;
use Azuriom\Models\Ban;
use Azuriom\Models\User;

class BanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.bans.index', [
            'bans' => Ban::withTrashed()->with(['user', 'author', 'remover'])->paginate(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BanRequest $request, User $user)
    {
        Ban::create([
            'user_id' => $user->id,
            'reason' => $request->input('reason'),
        ]);

        return to_route('admin.users.edit', $user)
            ->with('success', trans('admin.users.status.banned'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @throws \LogicException
     */
    public function destroy(User $user, Ban $ban)
    {
        $ban->removeBan();

        return to_route('admin.users.edit', $user)
            ->with('success', trans('admin.users.status.unbanned'));
    }
}
