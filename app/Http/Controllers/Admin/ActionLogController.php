<?php

namespace Azuriom\Http\Controllers\Admin;

use Azuriom\Http\Controllers\Controller;
use Azuriom\Models\ActionLog;
use Azuriom\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

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

        return view('admin.logs.index', [
            'logs' => $logs,
            'webhookUrl' => setting('logs.webhook_url'),
        ]);
    }

    /**
     * Update the settings for action logs.
     */
    public function updateSettings(Request $request)
    {
        $validated = $this->validate($request, [
            'webhook_url' => ['nullable', 'url'],
        ]);

        $old = ['logs.webhook_url' => setting('logs.webhook_url')];
        $new = Arr::prependKeysWith($validated, 'logs.');

        // Log first to ensure it's sent on Discord webhook
        ActionLog::log('settings.updated')?->createEntries($old, $new);

        Setting::updateSettings($new);

        return to_route('admin.logs.index')
            ->with('success', trans('messages.status.success'));
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
