<?php

namespace Azuriom\Support;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;
use InvalidArgumentException;

class EnvEditor
{
    /**
     * Edit values in the environment file
     * Based on https://github.com/imliam/laravel-env-set-command.
     *
     * @param  array  $values
     * @param  string|null  $path
     * @return bool
     */
    public static function updateEnv(array $values, string $path = null)
    {
        $envPath = $path ?? App::environmentFilePath();
        $contents = file_get_contents($envPath);

        foreach ($values as $key => $value) {
            $oldValue = self::getOldValue($contents, $key);

            if ($oldValue === null) {
                throw new InvalidArgumentException("No value match the key '{$key}'");
            }

            if (Str::contains($value, ' ')) {
                $value = '"'.$value.'"';
            }

            $contents = str_replace("{$key}={$oldValue}", "{$key}={$value}", $contents);
        }

        return file_put_contents($envPath, $contents) !== false;
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
