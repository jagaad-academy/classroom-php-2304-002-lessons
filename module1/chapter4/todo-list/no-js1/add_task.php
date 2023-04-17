<?php

define('FILE_STORAGE', 'db.json');

$myTasks = [];

// get the file content and transform to array of $myTasks
if (file_exists(FILE_STORAGE)) {
    $fileContent = file_get_contents(FILE_STORAGE);
    $myTasks = json_decode($fileContent, true);
}

// check if the form is sending the title correctly
if (! isset($_POST['title'])) {
    echo 'Please, send the form correctly with the "title" input.<br>';
    echo '<a href="index.php">Back to homepage</a>';
    die;
}

// push new task into the array
$myTasks[] = [
    'id' => uniqid(),
    'title' => $_POST['title'],
    'done' => false,
];

// store the updated array into the file
file_put_contents(FILE_STORAGE, json_encode($myTasks));

echo 'The new task was added successfully!<br>';
echo '<a href="index.php">Back to homepage</a>';
