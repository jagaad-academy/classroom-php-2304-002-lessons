<?php

$adapter = new League\Flysystem\Ftp\FtpAdapter(
// Connection options
    League\Flysystem\Ftp\FtpConnectionOptions::fromArray([
        'host' => 'ftp.dlptest.com', // required
        'root' => '', // required
        'username' => 'dlpuser', // required
        'password' => 'rNrKYTX9g7z3RgJRmxWuGHbeu', // required
        'port' => 21,
        'ssl' => false,
        'timeout' => 90,
        'utf8' => false,
        'passive' => true,
        'transferMode' => FTP_BINARY,
        'systemType' => null, // 'windows' or 'unix'
        'ignorePassiveAddress' => null, // true or false
        'timestampsOnUnixListingsEnabled' => false, // true or false
        'recurseManually' => true // true
    ])
);
