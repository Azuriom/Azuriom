<?php

namespace Azuriom\Support;

use Symfony\Component\Filesystem\Filesystem as SymfonyFilesystem;

class Files
{
    public static function removeLink(string $link)
    {
        // Symlink can be treated as directories on Windows...
        if (! is_link($link) && is_dir($link)) {
            rmdir($link);

            return;
        }

        // Symfony Filesystem has better symlink support than the Laravel's one
        (new SymfonyFilesystem())->remove($link);
    }
}
