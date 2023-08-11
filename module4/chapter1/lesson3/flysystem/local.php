<?php

// The internal adapter
$adapter = new League\Flysystem\Local\LocalFilesystemAdapter(
// Determine root directory
    __DIR__.'/../uploads/'
);
