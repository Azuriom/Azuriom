<?php

namespace Azuriom\Extensions;

use Illuminate\Translation\FileLoader;

class ExtensionFileLoader extends FileLoader
{
    /**
     * Load a local namespaced translation group for overrides.
     *
     * @param  string  $locale
     * @param  string  $group
     * @param  string  $namespace
     */
    protected function loadNamespaceOverrides(array $lines, $locale, $group, $namespace): array
    {
        if ($namespace === 'theme') {
            $namespace = themes()->currentTheme() ?? $namespace;
        }

        return collect($this->paths)
            ->reduce(function ($output, $path) use ($lines, $locale, $group, $namespace) {
                $file = "{$path}/{$locale}/extensions/{$namespace}/{$group}.php";

                if ($this->files->exists($file)) {
                    $lines = array_replace_recursive($lines, $this->files->getRequire($file));
                }

                return $lines;
            }, parent::loadNamespaceOverrides($lines, $locale, $group, $namespace));
    }
}
