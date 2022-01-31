<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class HelpersTest extends TestCase
{
    public function testColorContrast()
    {
        $this->assertSame('white', color_contrast('#2b3531'));
        $this->assertSame('white', color_contrast('#104682'));
        $this->assertSame('white', color_contrast('#49719f'));
        $this->assertSame('white', color_contrast('#3d25d4'));
        $this->assertSame('black', color_contrast('#cef5f5'));
        $this->assertSame('black', color_contrast('#d8ffaa'));
        $this->assertSame('black', color_contrast('#e1ce75'));
        $this->assertSame('black', color_contrast('#a5a5a5'));
    }
}
