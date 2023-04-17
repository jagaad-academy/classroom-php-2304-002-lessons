<?php

define('FILE_STORAGE', 'db.json');

$myTasks = [];

// get the file content and transform to array of $myTasks
if (file_exists(FILE_STORAGE)) {
    $fileContent = file_get_contents(FILE_STORAGE);
    $myTasks = json_decode($fileContent, true);
}

// check if the required fields was sent
$fieldsWasSent = isset($_POST['action']) && isset($_POST['taskIndex']);
if (! $fieldsWasSent) {
    echo 'I can NOT understand your request :/.<br>';
    echo '<a href="index.php">Back to homepage</a>';
    die;
}

$taskIndex = $_POST['taskIndex'];
$actionMessage = '';

// delete the task from array
if ($_POST['action'] === 'delete') {
    $actionMessage = 'deleted';
    unset($myTasks[$taskIndex]);
} 
// mark task as done
elseif ($_POST['action'] === 'done') {
    $actionMessage = 'updated';
    // switch the current status of the task with the exclamation mark
    $myTasks[$taskIndex]['done'] = !$myTasks[$taskIndex]['done'];
}

// store the updated array into the file
file_put_contents(FILE_STORAGE, json_encode($myTasks));

echo "The task was $actionMessage!<br>";
echo '<a href="index.php">Back to homepage</a>';
