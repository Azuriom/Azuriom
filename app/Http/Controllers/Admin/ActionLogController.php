<?php

namespace Azuriom\Http\Controllers\Admin;

use Azuriom\Http\Controllers\Controller;
use Azuriom\Models\ActionLog;
use Carbon\Carbon;

class ActionLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logs = ActionLog::with('target')
            ->latest()
            ->paginate(25);

        return view('admin.logs.index')->with('logs', $logs);
    }

    /**
     * Clear old records
     *
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function clear()
    {
        ActionLog::whereDate('created_at', '<', Carbon::now()->subDays(15))->delete();

        return redirect()->route('admin.logs.index')->with('success', 'Old logs deleted');
    }
}
