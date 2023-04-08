<?php

use Symfony\Component\Filesystem\Filesystem;

require_once 'vendor/autoload.php';

// To use this small script, just download the translations from Crowdin
// and place the unzipped folder in the same directory, and rename it
// as "crowdin_translations".

// The successfully translated locales (currently for >95% completed)
$locales = ['de', 'es-ES', 'fi', 'sv-SE', 'ru', 'zh-CN', 'ko', 'pt-BR', 'cs', 'ca', 'uk', 'hu', 'id'];

if (! is_dir('crowdin_translations')) {
    exit('The Crowdin translations must be in the "crowdin_translations" folder.');
}

$files = new Filesystem();

foreach ($locales as $locale) {
    $origin = 'crowdin_translations/'.$locale;
    $target = 'resources/lang/'.str_replace('-', '_', $locale);
    $targetExtensions = $target.'/extensions';
    $options = ['override' => true];

    if (! is_dir($origin)) {
        continue;
    }

    $files->mirror($origin.'/Azuriom', $target, null, $options);
    $files->mirror($origin.'/Plugins', $targetExtensions, null, $options);
    $files->mirror($origin.'/Themes', $targetExtensions, null, $options);

    foreach (new DirectoryIterator($targetExtensions) as $file) {
        if ($file->isDot()) {
            continue;
        }

        $currentName = $targetExtensions.'/'.$file->getFilename();
        $newName = $targetExtensions.'/'.strtolower($file->getFilename());

        $files->rename($currentName, $newName, true);
    }
}

echo 'Translations successfully exported!'.PHP_EOL;
