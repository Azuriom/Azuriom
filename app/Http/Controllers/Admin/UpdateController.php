<?php

namespace Azuriom\Http\Controllers\Admin;

use Azuriom\Azuriom;
use Azuriom\Extensions\UpdateManager;
use Azuriom\Http\Controllers\Controller;
use Azuriom\Models\ActionLog;
use Azuriom\Support\Optimizer;
use Exception;
use Illuminate\Database\SQLiteConnection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use RuntimeException;

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
            'isV1Downloaded' => $this->updates->isV1Downloaded(),
            'legacyPhp' => PHP_VERSION_ID < 80000,
            'sqlite' => DB::connection() instanceof SQLiteConnection,
            'extensionsIssue' => ! $this->extensionsUpToDateAndDisabled(),
            'invalidPath' => Str::contains(Str::after(url('/'), '//'), '/'),
        ]);
    }

    public function fetch()
    {
        $response = redirect()->route('admin.update.index');

        try {
            $this->updates->forceFetchUpdates();
        } catch (Exception $e) {
            return $response->with('error', trans('admin.update.status.error-fetch', [
                'error' => $e->getMessage(),
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
                'message' => trans('admin.update.status.up-to-date'),
            ]);
        }

        try {
            $this->updates->download($update);
        } catch (Exception $e) {
            return response()->json([
                'message' => trans('admin.update.status.error-download', [
                    'error' => $e->getMessage(),
                ]),
            ], 422);
        }

        $request->session()->flash('success', trans('admin.update.status.download-success'));

        return response()->noContent();
    }

    public function downloadV1(Request $request)
    {
        $update = $this->updates->getUpdateV1(true);

        try {
            $this->updates->download($update);
        } catch (Exception $e) {
            return response()->json([
                'message' => trans('admin.update.status.error-download', [
                    'error' => $e->getMessage(),
                ]),
            ], 422);
        }

        $request->session()->flash('success', trans('admin.update.status.download-success'));

        return response()->noContent();
    }

    public function install(Request $request)
    {
        $update = $this->updates->getUpdate(true);

        if (! $this->updates->hasUpdate()) {
            return response()->json([
                'message' => trans('admin.update.status.up-to-date'),
            ]);
        }

        if (! plugins()->getPluginToUpdate()->isEmpty()) {
            return response()->json([
                'message' => trans('admin.update.v1.extensions'),
            ], 422);
        }

        try {
            $this->updates->installUpdate($update);
        } catch (Exception $e) {
            return response()->json([
                'message' => trans('admin.update.status.error-install', [
                    'error' => $e->getMessage(),
                ]),
            ], 422);
        }

        $request->session()->flash('success', trans('admin.update.status.install-success'));

        ActionLog::log('updates.installed');

        return response()->noContent();
    }

    public function installV1(Request $request)
    {
        themes()->changeTheme(null);

        $update = $this->updates->getUpdateV1(true);

        if (file_put_contents(base_path('tmp.txt'), 'ok') === false) {
            throw new RuntimeException('Unable to create file on '.base_path());
        }

        ActionLog::log('updates.installed');

        // Enforce loading response class before updating to prevent issues
        $success = response()->noContent();

        try {
            app(Optimizer::class)->clear();

            Cache::flush();

            $this->updates->installUpdate($update, false);

            usleep(250); // Help with OPCache
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 422);
        }

        $request->session()->flash('success', trans('admin.update.status.install-success'));

        return $success;
    }

    public function version()
    {
        return response()->json([
            'azuriom' => Azuriom::version(),
            'php' => PHP_VERSION,
        ]);
    }

    protected function extensionsUpToDateAndDisabled()
    {
        if (! plugins()->getPluginToUpdate()->isEmpty()) {
            return false;
        }

        return ! themes()->hasTheme() && empty(plugins()->plugins());
    }
}
