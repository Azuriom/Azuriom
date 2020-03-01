<?php

namespace Azuriom\View;

use Illuminate\View\FileViewFinder;
use InvalidArgumentException;

class ThemeViewFinder extends FileViewFinder
{
    protected function findNamespacedView($name)
    {
        [$namespace, $view] = $this->parseNamespaceSegments($name);

        if (plugins()->isEnabled($namespace)) {
            try {
                return $this->find("plugins.{$namespace}.{$view}");
            } catch (InvalidArgumentException $e) {
                // ignore, theme don't have the plugin view, just use the default view
            }
        }

        return $this->findInPaths($view, $this->hints[$namespace]);
    }
}
