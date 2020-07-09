<?php

namespace Azuriom\Http\Controllers\Admin;

use Azuriom\Extensions\Plugin\PluginManager;
use Azuriom\Extensions\UpdateManager;
use Azuriom\Http\Controllers\Controller;
use Azuriom\Models\ActionLog;
use Exception;
use Throwable;

class PluginController extends Controller
{
    /**
     * The extension manager.
     *
     * @var \Azuriom\Extensions\Plugin\PluginManager
     */
    private $plugins;

    /**
     * Create a new controller instance.
     *
     * @param  \Azuriom\Extensions\Plugin\PluginManager  $plugins
     */
    public function __construct(PluginManager $plugins)
    {
        $this->plugins = $plugins;
    }

    /**
     * Display a listing of the extensions.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plugins = collect($this->plugins->findPluginsDescriptions());
        $availablePlugins = collect($this->plugins->getOnlinePlugins());
        $pluginsUpdates = collect($this->plugins->getPluginToUpdate());

        return view('admin.plugins.index', [
            'plugins' => $plugins,
            'availablePlugins' => $availablePlugins,
            'pluginsUpdates' => $pluginsUpdates,
        ]);
    }

    public function reload()
    {
        $response = redirect()->route('admin.plugins.index');

        try {
            app(UpdateManager::class)->forceFetchUpdates();
        } catch (Exception $e) {
            return $response->with('error', trans('messages.status-error', [
                'error' => $e->getMessage(),
            ]));
        }

        return $response->with('success', trans('admin.plugins.status.reloaded'));
    }

    public function enable(string $plugin)
    {
        try {
            $this->plugins->enable($plugin);
        } catch (Throwable $t) {
            return redirect()->route('admin.plugins.index')->with('error', trans('messages.status-error', [
                'error' => $t->getMessage(),
            ]));
        }

        $response = redirect()->route('admin.plugins.index')->with('success', trans('admin.plugins.status.enabled'));

        $this->plugins->refreshRoutesCache();

        ActionLog::log('plugins.enabled');

        return $response;
    }

    public function disable(string $plugin)
    {
        $this->plugins->disable($plugin);

        $response = redirect()->route('admin.plugins.index')->with('success', trans('admin.plugins.status.disabled'));

        $this->plugins->refreshRoutesCache();

        ActionLog::log('plugins.disabled');

        return $response;
    }

    public function update(string $plugin)
    {
        $description = $this->plugins->findDescription($plugin);

        try {
            if ($description !== null && isset($description->apiId)) {
                $this->plugins->install($description->apiId);
            }
        } catch (Throwable $t) {
            return redirect()->route('admin.plugins.index')->with('error', trans('messages.status-error', [
                'error' => $t->getMessage(),
            ]));
        }

        $response = redirect()->route('admin.plugins.index')->with('success', trans('admin.plugins.status.updated'));

        $this->plugins->refreshRoutesCache();

        return $response;
    }

    public function download(string $pluginId)
    {
        try {
            $this->plugins->install($pluginId);
        } catch (Throwable $t) {
            report($t);

            return redirect()->route('admin.plugins.index')->with('error', trans('messages.status-error', [
                'error' => $t->getMessage(),
            ]));
        }

        return redirect()->route('admin.plugins.index')->with('success', trans('admin.plugins.status.installed'));
    }

    public function delete(string $plugin)
    {
        if ($this->plugins->isEnabled($plugin)) {
            return redirect()->route('admin.plugins.index')->with('error', trans('admin.plugins.status.error-delete'));
        }

        $this->plugins->delete($plugin);

        return redirect()->route('admin.plugins.index')->with('success', trans('admin.plugins.status.deleted'));
    }
}
