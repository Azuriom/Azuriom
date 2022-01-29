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

    public function bindPlugin($plugin)
    {
        $this->plugin = $plugin;
    }
}
