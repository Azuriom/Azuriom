<?php

namespace Azuriom\Extensions\Plugin;

trait HasPlugin
{
    /**
     * The associated module name.
     *
     * @var string
     */
    protected $pluginName;

    public function bindName(string $name)
    {
        if ($this->pluginName === null) {
            $this->pluginName = $name;
        }
    }
}
