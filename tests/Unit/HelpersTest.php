<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class HelpersTest extends TestCase
{
    public function testColorHex2rgb(): void
    {
        $this->assertSame([0, 0, 0], hex2rgb('#000000'));
        $this->assertSame([255, 255, 255], hex2rgb('#ffffff'));
        $this->assertSame([13, 110, 253], hex2rgb('#0d6efd'));
        $this->assertSame([170, 187, 221], hex2rgb('#abd'));
    }

    public function testColorRGB(): void
    {
        $this->assertSame('rgb(0, 0, 0)', color_rgb('#000000'));
        $this->assertSame('rgb(255, 255, 255)', color_rgb('#ffffff'));
        $this->assertSame('rgb(13, 110, 253)', color_rgb('#0d6efd'));
        $this->assertSame('rgb(170, 187, 221)', color_rgb('#abd'));
    }

    public function testColorContrast(): void
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

    public function testColorShade(): void
    {
        $this->assertSame('#052c65', color_shade('#0d6efd', 0.6));
        $this->assertSame('#2b2f32', color_shade('#6c757d', 0.6));
        $this->assertSame('#0a3622', color_shade('#198754', 0.6));
    }

    public function testColorTint(): void
    {
        $this->assertSame('#031633', color_shade('#0d6efd', 0.8));
        $this->assertSame('#161719', color_shade('#6c757d', 0.8));
        $this->assertSame('#0a3622', color_shade('#198754', 0.6));
    }
}
