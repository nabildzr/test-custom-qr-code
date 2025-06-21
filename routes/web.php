<?php

use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\Label\Font\OpenSans;
use Endroid\QrCode\Label\LabelAlignment;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\RoundBlockSizeMode;
use Endroid\QrCode\Writer\PngWriter;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/qr-code', function () {
    $builder = new Builder(
        writer: new PngWriter(),
        writerOptions: [],
        validateResult: false,
        data: 'Custom QR code contents',
        encoding: new Encoding('UTF-8'),
        errorCorrectionLevel: ErrorCorrectionLevel::High,
        size: 300,
        margin: 10,
        roundBlockSizeMode: RoundBlockSizeMode::Margin,
        logoPath: public_path('images/logo.png'),
        logoResizeToWidth: 50,
        logoPunchoutBackground: true,
        labelText: 'This is the label',
        labelFont: new OpenSans(20),
        labelAlignment: LabelAlignment::Center
    );

    $result = $builder->build();

    $qrPath = ('qr_code_event/qr_code.png');
    $result->saveToFile($qrPath);

    return view('qr')->with([
        'qrPath' => $qrPath
    ]);
});
