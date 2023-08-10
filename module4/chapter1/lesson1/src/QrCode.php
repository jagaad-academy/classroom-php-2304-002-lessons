<?php

/**
 * Declaration of class
 */

namespace Jagaad\Module4;

use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;
use Endroid\QrCode\Label\Alignment\LabelAlignmentCenter;
use Endroid\QrCode\Label\Font\NotoSans;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Writer\PngWriter;

/**
 * Class for generation of QRCodes
 */
class QrCode
{
    /**
     *
     *
     * @phpstan-ignore-next-line
     */
    public function renderCode()
    {
        $result = Builder::create()
            ->writer(new PngWriter())
            ->writerOptions([])
            ->data('https://jagaad.com/')
            ->encoding(new Encoding('UTF-8'))
            ->errorCorrectionLevel(new ErrorCorrectionLevelHigh())
            ->size(500)
            ->margin(50)
            ->roundBlockSizeMode(new RoundBlockSizeModeMargin())
            ->logoPath(__DIR__ . '/../assets/symfony.png')
            ->logoResizeToWidth(50)
            ->logoPunchoutBackground(true)
            ->labelText('This is the label of Module 4')
            ->labelFont(new NotoSans(20))
            ->labelAlignment(new LabelAlignmentCenter())
            ->validateResult(false)
            ->build();

        // Directly output the QR code
        header('Content-Type: ' . $result->getMimeType());
        echo $result->getString();
    }

    /**
     * @return void
     */
    public function index(): void
    {
        echo "Test of Symfony Routing!";
    }
}
