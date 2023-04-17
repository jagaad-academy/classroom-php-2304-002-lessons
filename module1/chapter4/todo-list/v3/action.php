<?php

define('TASKS_FILE_NAME', 'db.json');

require_once __DIR__ . '/task_fn.php';

$myTasks = [];

// if the file doesn't exist, create it
if (! file_exists(TASKS_FILE_NAME)) {
    file_put_contents(TASKS_FILE_NAME, json_encode($myTasks));
}

// read the file if it exists
$myTasks = json_decode(file_get_contents(TASKS_FILE_NAME), true);

// action response
$response = null;

// check if it's a POST request (sent by the form)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $response = match ($_POST['action']) {
        'add-task' => addNewTask($myTasks, $_POST['title']),
        'delete-task' => deleteTask($myTasks, $_POST['taskIndex']),
        'marked-task' => markTaskAsDone($myTasks, $_POST['taskIndex']),
    };

    $myTasks = $response['myTasks'];
}
