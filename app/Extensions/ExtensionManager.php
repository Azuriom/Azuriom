<?php

namespace Azuriom\Extensions;

use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Filesystem\Filesystem;

abstract class ExtensionManager
{
    protected Filesystem $files;

    public function __construct(Filesystem $files)
    {
        $this->files = $files;
    }

    /**
     * Read the content of a json.
     */
    protected function getJson(string $path, bool $asoc = false): object|array|null
    {
        if (! $this->files->isFile($path)) {
            return null;
        }

        try {
            return json_decode($this->files->get($path), $asoc);
        } catch (FileNotFoundException) {
            return null;
        }
    }
}
