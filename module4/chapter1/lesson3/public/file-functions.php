<?php

// @todo: move to the classes

// handle the file names storage

define('STORAGE_FILES', __DIR__ . '/../storage/filenames.json');

function saveFileName(string $fileName): void
{
    $listOfFiles = getListOfUploadedFiles();
    $listOfFiles[] = $fileName;
    file_put_contents(STORAGE_FILES, json_encode($listOfFiles));
}

function getListOfUploadedFiles(): array
{
    if (! file_exists(STORAGE_FILES)) {
        file_put_contents(STORAGE_FILES, json_encode([]));
    }
    return json_decode(file_get_contents(STORAGE_FILES), true);
}