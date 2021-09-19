<?php

namespace Azuriom\Extensions\Plugin;

trait HasPlugin
{
    /**
     * The associated plugin.
     *
     * @var mixed
     */
    protected $plugin;

    /**
     * The associated plugin name.
     *
     * @var string
     *
     * @deprecated Use $plugin->id instead. Will be removed in Azuriom 1.0
     */
    // TODO 1.0: Remove deprecated variable
    protected $pluginName;

    public function bindPlugin($plugin)
    {
        $this->plugin = $plugin;
        $this->pluginName = $plugin->id;
    }
}
