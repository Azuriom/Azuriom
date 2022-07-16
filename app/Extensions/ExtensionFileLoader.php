<?php

namespace Azuriom\Extensions;

use Illuminate\Translation\FileLoader;

class ExtensionFileLoader extends FileLoader
{
    protected function loadNamespaceOverrides(array $lines, $locale, $group, $namespace)
    {
        if ($namespace === 'theme') {
            $namespace = themes()->currentTheme() ?? $namespace;
        }

        $file = "{$this->path}/{$locale}/extensions/{$namespace}/{$group}.php";

        if ($this->files->exists($file)) {
            return array_replace_recursive($lines, $this->files->getRequire($file));
        }

        return parent::loadNamespaceOverrides($lines, $locale, $group, $namespace);
    }
}
