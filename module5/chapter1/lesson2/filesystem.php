<?php
/**
 * filesystem.php
 * hennadii.shvedko
 * 12.09.2023
 */


$filesystem = new FilesystemIterator('src', FilesystemIterator::CURRENT_AS_PATHNAME);

foreach ($filesystem as $file) {
    if($filesystem->isFile()){
        echo $filesystem->getFileInfo() . PHP_EOL;
    }
}
