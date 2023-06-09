<?php

ini_set('file_uploads', 'On');

$targetDir = "uploads/";

if(!file_exists($targetDir)){
    mkdir($targetDir);
}

$targetFileName = 'testFile';

if (isset($_POST["submit"])) {
    $result = move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetDir . $targetFileName);
    if($result) {
        echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
    } else {
        echo "Something went wrong!";
    }
}

