<?php
define('FILE_STORAGE', 'db.json');

$myTasks = [];

// get the file content and transform to array of $myTasks
if (file_exists(FILE_STORAGE)) {
    $fileContent = file_get_contents(FILE_STORAGE);
    $myTasks = json_decode($fileContent, true);
}

$foundKey = null;
foreach ($myTasks as $key => $task) {
    if ($task['id'] === $_POST['id']) {
        $foundKey = $key;
        break;
    }
}

$myTasks[$foundKey]['title'] = $_POST['title'];

file_put_contents(FILE_STORAGE, json_encode($myTasks));

echo 'The task was updated successfully!<br>';
echo '<a href="index.php">Back to homepage</a>';
