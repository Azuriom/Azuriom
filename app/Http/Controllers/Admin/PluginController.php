<?php

namespace Azuriom\Http\Controllers\Admin;

use Azuriom\Azuriom;
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
     */
    private PluginManager $plugins;

    /**
     * Create a new controller instance.
     */
    public function __construct(PluginManager $plugins)
    {
        $this->plugins = $plugins;
    }

    /**
     * Display a listing of the extensions.
     */
    public function index()
    {
        return view('admin.plugins.index', [
            'plugins' => $this->plugins->findPluginsDescriptions(),
            'availablePlugins' => $this->plugins->getOnlinePlugins(),
            'pluginsUpdates' => $this->plugins->getPluginsToUpdate(),
        ]);
    }

    public function reload()
    {
        $response = to_route('admin.plugins.index');

        try {
            app(UpdateManager::class)->forceFetchUpdates();
        } catch (Exception $e) {
            return $response->with('error', trans('messages.status.error', [
                'error' => $e->getMessage(),
            ]));
        }

        return $response->with('success', trans('admin.plugins.reloaded'));
    }

    public function enable(string $plugin)
    {
        try {
            if (! $this->plugins->isSupportedByGame($plugin)) {
                return to_route('admin.plugins.index')
                    ->with('error', trans('admin.plugins.requirements.game', [
                        'game' => game()->name(),
                    ]));
            }

            $missing = $this->plugins->getMissingRequirements($plugin);

            if ($missing === 'azuriom' || $missing === 'api') {
                return to_route('admin.plugins.index')
                    ->with('error', trans('admin.plugins.requirements.'.$missing, [
                        'version' => Azuriom::apiVersion(),
                    ]));
            }

            if ($missing !== null) {
                return to_route('admin.plugins.index')
                    ->with('error', trans('admin.plugins.requirements.plugin', [
                        'plugin' => $missing,
                    ]));
            }

            $this->plugins->enable($plugin);
        } catch (Throwable $t) {
            report($t);

            return to_route('admin.plugins.index')
                ->with('error', trans('messages.status.error', [
                    'error' => $t->getMessage(),
                ]));
        }

        $response = to_route('admin.plugins.index')
            ->with('success', trans('admin.plugins.enabled'));

        $this->plugins->purgeInternalCache();

        ActionLog::log('plugins.enabled', data: ['plugin' => $plugin]);

        return $response;
    }

    public function disable(string $plugin)
    {
        $this->plugins->disable($plugin);

        $response = to_route('admin.plugins.index')
            ->with('success', trans('admin.plugins.disabled'));

        $this->plugins->purgeInternalCache();

        ActionLog::log('plugins.disabled', data: ['plugin' => $plugin]);

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
            return to_route('admin.plugins.index')
                ->with('error', trans('messages.status.error', [
                    'error' => $t->getMessage(),
                ]));
        }

        $response = to_route('admin.plugins.index')
            ->with('success', trans('admin.plugins.updated'));

        $this->plugins->purgeInternalCache();

        return $response;
    }

    public function download(string $pluginId)
    {
        try {
            $this->plugins->install($pluginId);
        } catch (Throwable $t) {
            report($t);

            return to_route('admin.plugins.index')
                ->with('error', trans('messages.status.error', [
                    'error' => $t->getMessage(),
                ]));
        }

        return to_route('admin.plugins.index')
            ->with('success', trans('admin.plugins.installed'));
    }

    public function delete(string $plugin)
    {
        if ($this->plugins->isEnabled($plugin)) {
            return to_route('admin.plugins.index')
                ->with('error', trans('admin.plugins.delete_enabled'));
        }

        $this->plugins->delete($plugin);

        return to_route('admin.plugins.index')
            ->with('success', trans('admin.plugins.deleted'));
    }
}
