<?php

namespace Azuriom\Extensions\Plugin;

trait HasPlugin
{
    /**
     * The associated plugin.
     */
    protected mixed $plugin;

    public function bindPlugin($plugin)
    {
        $this->plugin = $plugin;
    }
}
