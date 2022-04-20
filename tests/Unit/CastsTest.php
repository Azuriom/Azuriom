<?php

namespace Tests\Unit;

use Azuriom\Models\Role;
use PHPUnit\Framework\TestCase;

class CastsTest extends TestCase
{
    public function testColorCast()
    {
        $colors = ['#ff0000', 'ff0000', '#f00', 'f00'];

        $object = new Role();

        foreach ($colors as $color) {
            $object->color = $color;

            $this->assertSame('#ff0000', $object->color);
        }
    }
}
