<?php
require_once __DIR__ . "/../vendor/autoload.php";

require_once "ftp.php";

// The FilesystemOperator
$filesystem = new League\Flysystem\Filesystem($adapter);

try {
    $filesystem->write('localTest1.json', json_encode(['local1' => 'test']));
//    $filesystem->delete('localTest.json');
} catch (\League\Flysystem\FilesystemException $e) {
    var_dump($e);
}
