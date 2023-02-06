<?php

namespace Azuriom\Http\Controllers\Admin;

use Azuriom\Http\Controllers\Controller;
use Azuriom\Models\ActionLog;

class ActionLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
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
     *
     * @param  \Azuriom\Models\ActionLog  $log
     * @return \Illuminate\Http\Response
     */
    public function show(ActionLog $log)
    {
        return view('admin.logs.show', ['log' => $log->load('entries')]);
    }

    /**
     * Clear old records.
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Exception
     */
    public function clear()
    {
        ActionLog::whereDate('created_at', '<', now()->subDays(15))->delete();

        return redirect()->route('admin.logs.index')
            ->with('success', trans('admin.logs.cleared'));
    }
}
