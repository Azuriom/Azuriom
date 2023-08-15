<?php

namespace Azuriom\Http\Controllers\Admin;

use Azuriom\Http\Controllers\Controller;
use Azuriom\Models\ActionLog;

class ActionLogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $logs = ActionLog::onlyGlobal()
            ->with(['user', 'target'])
            ->latest()
            ->paginate();

        return view('admin.logs.index', ['logs' => $logs]);
    }

    /**
     * Display the specified resource.
     */
    public function show(ActionLog $log)
    {
        return view('admin.logs.show', ['log' => $log->load('entries')]);
    }

    /**
     * Clear old records.
     *
     * @throws \LogicException
     */
    public function clear()
    {
        ActionLog::whereDate('created_at', '<', now()->subDays(15))->delete();

        return to_route('admin.logs.index')
            ->with('success', trans('admin.logs.cleared'));
    }
}
