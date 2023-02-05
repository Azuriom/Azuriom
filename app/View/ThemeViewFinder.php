<?php

namespace Azuriom\View;

use Illuminate\View\FileViewFinder;
use InvalidArgumentException;

class ThemeViewFinder extends FileViewFinder
{
    protected function findNamespacedView($name)
    {
        [$namespace, $view] = $this->parseNamespaceSegments($name);

        // If the view is from a plugin, search in the 'plugins' directory
        if (plugins()->isEnabled($namespace)) {
            try {
                return $this->findInPaths("plugins.{$namespace}.{$view}", $this->paths);
            } catch (InvalidArgumentException) {
                // ignore, theme don't have the plugin view, just use the default view
            }
        }

        try {
            // Try to find the view in the theme.
            return $this->findInPaths("vendor.{$namespace}.{$view}", $this->paths);
        } catch (InvalidArgumentException) {
            // Nothing found, fallback to the default view
            return $this->findInPaths($view, $this->hints[$namespace]);
        }
    }
}
