<?php

namespace Azuriom\Http\Controllers\Admin;

use Azuriom\Azuriom;
use Azuriom\Extensions\UpdateManager;
use Azuriom\Http\Controllers\Controller;
use Azuriom\Models\ActionLog;
use Exception;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    /**
     * The update manager instance.
     *
     * @var \Azuriom\Extensions\UpdateManager
     */
    protected $updates;

    /**
     * Create a new controller instance.
     *
     * @param  \Azuriom\Extensions\UpdateManager  $updates
     */
    public function __construct(UpdateManager $updates)
    {
        $this->updates = $updates;
    }

    public function index()
    {
        return view('admin.update.index', [
            'lastVersion' => $this->updates->getLastVersion(),
            'hasUpdate' => $this->updates->hasUpdate(),
            'isDownloaded' => $this->updates->isLastVersionDownloaded(),
        ]);
    }

    public function fetch()
    {
        $response = redirect()->route('admin.update.index');

        try {
            $this->updates->forceFetchUpdates();
        } catch (Exception $e) {
            return $response->with('error', trans('messages.status.error', [
                'error' => $e->getMessage(),
            ]));
        }

        if (! $this->updates->hasUpdate(true)) {
            return $response->with('success', trans('admin.update.latest'));
        }

        return $response;
    }

    public function download(Request $request)
    {
        $update = $this->updates->getUpdate(true);

        if (! $this->updates->hasUpdate()) {
            return response()->json([
                'message' => trans('admin.update.latest'),
            ]);
        }

        try {
            $this->updates->download($update);
        } catch (Exception $e) {
            return response()->json([
                'message' => trans('message.status.error', [
                    'error' => $e->getMessage(),
                ]),
            ], 422);
        }

        $request->session()->flash('success', trans('admin.update.downloaded'));

        return response()->noContent();
    }

    public function install(Request $request)
    {
        $update = $this->updates->getUpdate(true);

        if (! $this->updates->hasUpdate()) {
            return response()->json([
                'message' => trans('admin.update.latest'),
            ]);
        }

        try {
            $this->updates->installUpdate($update);
        } catch (Exception $e) {
            return response()->json([
                'message' => trans('messages.status.error', [
                    'error' => $e->getMessage(),
                ]),
            ], 422);
        }

        $request->session()->flash('success', trans('admin.update.installed'));

        ActionLog::log('updates.installed');

        return response()->noContent();
    }

    public function version()
    {
        return response()->json([
            'azuriom' => Azuriom::version(),
            'php' => PHP_VERSION,
        ]);
    }
}
