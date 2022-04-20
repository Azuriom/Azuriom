<?php

namespace Azuriom\Support;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;
use InvalidArgumentException;
use RuntimeException;

class EnvEditor
{
    /**
     * Edit values in the environment file
     * Based on https://github.com/imliam/laravel-env-set-command, under MIT license.
     *
     * @param  array  $values
     * @param  string|null  $path
     */
    public static function updateEnv(array $values, string $path = null)
    {
        $envPath = $path ?? App::environmentFilePath();
        $content = file_get_contents($envPath);

        if ($content === false) {
            throw new RuntimeException('Unable to read .env file: '.$envPath);
        }

        foreach ($values as $key => $value) {
            $oldValue = self::getOldValue($content, $key);

            if ($oldValue === null) {
                throw new InvalidArgumentException("No value match the key '{$key}'");
            }

            if (Str::contains($value, [' ', '#'])) {
                $value = '"'.$value.'"';
            }

            $content = str_replace("{$key}={$oldValue}", "{$key}={$value}", $content);
        }

        if (file_put_contents($envPath, $content) === false) {
            throw new RuntimeException('Unable to write .env file: '.$envPath);
        }
    }

    protected static function getOldValue(string $envContents, string $key)
    {
        preg_match("/^{$key}=[^\r\n]*/m", $envContents, $matches);
        if (count($matches)) {
            return substr($matches[0], strlen($key) + 1);
        }

        return null;
    }
}
