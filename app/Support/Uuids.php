<?php

namespace Azuriom\Support;

use Ramsey\Uuid\UuidFactory;

class Uuids extends UuidFactory
{
    /**
     * Static factory to retrieve a type 3 (name based) UUID based on
     * the specified string.
     *
     * @param  string  $name
     * @return \Ramsey\Uuid\UuidInterface
     */
    public static function uuidFromName(string $name)
    {
        return (new UuidFactory())->uuidFromHashedName(md5($name), 3);
    }
}
