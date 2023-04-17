<?php

require_once __DIR__ . '/../vendor/autoload.php';

require_once __DIR__ . '/file-functions.php';

use FileUploadsExample\FileStorageFactory;

$fileStorage = FileStorageFactory::make();

$fileToUpload = new \FileUploadsExample\File(
    $_FILES['fileToUpload']['tmp_name'],
    $_FILES['fileToUpload']['name']
);

$anotherFile = new \FileUploadsExample\File(
    $_FILES['anotherFile']['tmp_name'],
    $_FILES['anotherFile']['name']
);

$fileStorage->storeAll([ $fileToUpload, $anotherFile ]);

saveFileName($fileToUpload->fileNameAsUnique());
saveFileName($anotherFile->fileNameAsUnique());


/*
echo '<pre>';

//var_dump($_FILES['fileToUpload']);
//die;

$fileTmpName = $_FILES['fileToUpload']['tmp_name'];
$fileName = $_FILES['fileToUpload']['name'];
$fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
$fileUniqueName = uniqid('file', true) . '.' . $fileExt;

$fileTmpName2 = $_FILES['anotherFile']['tmp_name'];
$fileName2 = $_FILES['anotherFile']['name'];
$fileExt2 = pathinfo($fileName, PATHINFO_EXTENSION);
$fileUniqueName2 = uniqid('file', true) . '.' . $fileExt;

// ./Jagaad Logo.png

// recommendations to store it (DB)
// base64

$res = move_uploaded_file($fileTmpName, __DIR__ . '/uploads/' . $fileUniqueName);
$res2 = move_uploaded_file($fileTmpName2, __DIR__ . '/uploads/' . $fileUniqueName2);
var_dump($res, $res2);
*/

echo 'file uploaded and moved :)';
