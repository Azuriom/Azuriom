<?php

namespace Azuriom\Support;

use BaconQrCode\Common\ErrorCorrectionLevel;
use BaconQrCode\Encoder\Encoder;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use Illuminate\Support\Str;

class QrCodeRenderer
{
    /**
     * Render the QR Code with a dynamic size to prevent blurry images.
     *
     * @param  string  $content
     * @param  int  $size
     * @param  int  $margin
     * @return string
     */
    public static function render(string $content, int $size, int $margin = 4)
    {
        $qrCode = Encoder::encode($content, ErrorCorrectionLevel::L());
        $width = $qrCode->getMatrix()->getWidth() + (2 * $margin);
        $style = new RendererStyle($width * round($size / $width), $margin);
        $renderer = new ImageRenderer($style, new SvgImageBackEnd());

        return Str::after($renderer->render($qrCode), '?>');
    }
}
