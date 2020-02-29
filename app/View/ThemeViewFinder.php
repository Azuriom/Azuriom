<?php

namespace Azuriom\View;

use Illuminate\View\FileViewFinder;

class ThemeViewFinder extends FileViewFinder
{
    protected function findNamespacedView($name)
    {
        [$namespace, $view] = $this->parseNamespaceSegments($name);

        if (plugins()->isEnabled($namespace)) {
            return $this->find("plugins.{$namespace}.{$view}");
        }

        return $this->findInPaths($view, $this->hints[$namespace]);
    }
}
