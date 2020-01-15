<?php

namespace Azuriom\Http\Controllers\Admin;

use Azuriom\Extensions\Plugin\PluginManager;
use Azuriom\Http\Controllers\Controller;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Artisan;

class PluginController extends Controller
{
    /**
     * The extension manager
     *
     * @var \Azuriom\Extensions\Plugin\PluginManager $plugins
     */
    private $plugins;

    /**
     * The filesystem instance.
     *
     * @var \Illuminate\Filesystem\Filesystem
     */
    private $files;

    /**
     * ThemeController constructor.
     * @param  \Azuriom\Extensions\Plugin\PluginManager  $plugins
     * @param  \Illuminate\Filesystem\Filesystem  $files
     */
    public function __construct(PluginManager $plugins, Filesystem $files)
    {
        $this->plugins = $plugins;
        $this->files = $files;
    }

    /**
     * Display a listing of the extensions.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plugins = $this->plugins->findPluginsDescriptions();

        return view('admin.plugins.index', ['plugins' => $plugins]);
    }

    public function reload()
    {
        $this->plugins->cachePlugins();

        return redirect()->route('admin.plugins.index')->with('success', trans('admin.plugins.status.reloaded'));
    }

    public function enable(string $plugin)
    {
        $this->plugins->enable($plugin);

        $response = redirect()->route('admin.plugins.index')->with('success', trans('admin.plugins.status.enabled'));

        if (app()->routesAreCached()) {
            Artisan::call('route:cache');
        }

        return $response;
    }

    public function disable(string $plugin)
    {
        $this->plugins->disable($plugin);

        $response = redirect()->route('admin.plugins.index')->with('success', trans('admin.plugins.status.disabled'));

        if (app()->routesAreCached()) {
            Artisan::call('route:cache');
        }

        return $response;
    }
}
