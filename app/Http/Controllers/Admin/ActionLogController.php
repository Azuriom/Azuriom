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
        return view('admin.logs.index', [
            'logs' => ActionLog::with('target')->latest()->paginate(25)
        ]);
    }

    /**
     * Clear old records
     *
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function clear()
    {
        ActionLog::whereDate('created_at', '<', now()->subDays(15))->delete();

        return redirect()->route('admin.logs.index')->with('success', trans('admin.logs.status.cleared'));
    }
}
