<?php

use Symfony\Component\Filesystem\Filesystem;

require_once 'vendor/autoload.php';

// To use this small script, just download the translations from Crowdin
// and place the unzipped folder in the same directory, and rename it
// as "crowdin_translations".

// The successfully translated locales (currently for >95% completed)
$locales = ['ca', 'cs', 'zh-CN', 'de', 'id', 'ru', 'es-ES'];

if (! is_dir('crowdin_translations')) {
    exit('The Crowdin translations must be in the "crowdin_translations" folder.');
}

$files = new Filesystem();

foreach ($locales as $locale) {
    $origin = 'crowdin_translations/'.$locale;
    $target = 'resources/lang/'.$locale;
    $targetExtensions = $target.'/extensions';

    if (! is_dir($origin)) {
        continue;
    }

    $files->mirror($origin.'/Azuriom', $target);
    $files->mirror($origin.'/Plugins', $targetExtensions);
    $files->mirror($origin.'/Themes', $targetExtensions);

    foreach (new DirectoryIterator($targetExtensions) as $file) {
        if ($file->isDot()) {
            continue;
        }

        $currentName = $targetExtensions.'/'.$file->getFilename();
        $newName = $targetExtensions.'/'.strtolower($file->getFilename());

        $files->rename($currentName, $newName, true);
    }
}

echo 'Success!';
