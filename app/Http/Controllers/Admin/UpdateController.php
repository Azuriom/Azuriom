<?php

namespace Azuriom\Http\Controllers\Admin;

use Azuriom\Extensions\UpdateManager;
use Azuriom\Http\Controllers\Controller;
use Azuriom\Models\ActionLog;
use Illuminate\Http\Request;
use Throwable;

class UpdateController extends Controller
{
    /**
     * The update manager instance.
     *
     * @var \Azuriom\Extensions\UpdateManager
     */
    protected $updates;

    /**
     * UpdateController constructor.
     * @param  \Azuriom\Extensions\UpdateManager  $updates
     */
    public function __construct(UpdateManager $updates)
    {
        $this->updates = $updates;
    }

    public function index()
    {
        $version = $this->updates->getLastVersion();

        return view('admin.update.index', [
            'lastVersion' => $version,
            'hasUpdate' => $this->updates->hasUpdate(),
            'isDownloaded' => $this->updates->isLastVersionDownloaded()
        ]);
    }

    public function fetch()
    {
        $response = redirect()->route('admin.update.index');

        try {
            $this->updates->forceFetchUpdatesOrFail();
        } catch (Throwable $t) {
            return $response->with('error', trans('admin.update.status.error-fetch', [
                'error' => $t->getMessage()
            ]));
        }

        if (! $this->updates->hasUpdate(true)) {
            return $response->with('success', trans('admin.update.status.up-to-date'));
        }

        return $response;
    }

    public function download(Request $request)
    {
        $update = $this->updates->getUpdate(true);

        if (! $this->updates->hasUpdate()) {
            return response()->json([
                'status' => 'success',
                'message' => trans('admin.update.status.up-to-date')
            ]);
        }

        try {
            $this->updates->download($update);
        } catch (Throwable $t) {
            return response()->json([
                'status' => 'error',
                'message' => trans('admin.update.status.error-download', [
                    'error' => $t->getMessage()
                ])
            ], 422);
        }

        $request->session()->flash('success', trans('admin.update.status.download-success'));

        return response()->json(['status' => 'success']);
    }

    public function install(Request $request)
    {
        $update = $this->updates->getUpdate(true);

        if (! $this->updates->hasUpdate()) {
            return response()->json([
                'status' => 'success',
                'message' => trans('admin.update.status.up-to-date')
            ]);
        }

        try {
            $this->updates->install($update, base_path());
        } catch (Throwable $t) {
            return response()->json([
                'status' => 'error',
                'message' => trans('admin.update.status.error-install', [
                    'error' => $t->getMessage()
                ])
            ], 422);
        }

        $request->session()->flash('success', trans('admin.update.status.install-success'));

        ActionLog::log('updates.installed');

        return response()->json(['status' => 'success']);
    }
}
