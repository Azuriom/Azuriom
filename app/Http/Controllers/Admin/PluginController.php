<?php

namespace Azuriom\Http\Controllers\Admin;

use Azuriom\Extensions\ExtensionsManager;
use Azuriom\Http\Controllers\Controller;
use Illuminate\Filesystem\Filesystem;

class PluginController extends Controller
{
    /**
     * The extension manager
     *
     * @var \Azuriom\Extensions\ExtensionsManager $extensions ;
     */
    private $extensions;

    /**
     * The filesystem instance.
     *
     * @var \Illuminate\Filesystem\Filesystem
     */
    private $files;

    /**
     * ThemeController constructor.
     * @param  \Azuriom\Extensions\ExtensionsManager  $extensions
     * @param  \Illuminate\Filesystem\Filesystem  $files
     */
    public function __construct(ExtensionsManager $extensions, Filesystem $files)
    {
        $this->extensions = $extensions;
        $this->files = $files;
    }

    /**
     * Display a listing of the extensions.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plugins = $this->extensions->getPluginsDescriptions();

        return view('admin.plugins.index', ['plugins' => $plugins]);
    }

    public function enable(string $plugin)
    {
        $this->extensions->setPluginEnabled($plugin, true);

        return redirect()->route('admin.plugins.index')->with('success', 'Plugin enabled.');
    }

    public function disable(string $plugin)
    {
        $this->extensions->setPluginEnabled($plugin, false);

        return redirect()->route('admin.plugins.index')->with('success', 'Plugin disabled.');
    }
}
