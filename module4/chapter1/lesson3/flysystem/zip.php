<?php

use League\Flysystem\ZipArchive\ZipArchiveAdapter;
use League\Flysystem\ZipArchive\FilesystemZipArchiveProvider;

$pathToZip = __DIR__.'/../uploads/test.zip';
$adapter = new ZipArchiveAdapter(
    new FilesystemZipArchiveProvider($pathToZip)
);
