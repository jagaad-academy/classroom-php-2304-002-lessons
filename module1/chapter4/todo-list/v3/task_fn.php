<?php

function addNewTask(array $myTasks, string $title): array {
    // check if the title coming from the form already 
    // exists in the DB, if it exists, return $myTasks
    // with no modification (not appeding).
    foreach ($myTasks as $task) {
        // add fn strtolower to have a case insensitive validation
        if (strtolower($title) === strtolower($task['title'])) {
            return [
                'success' => false,
                'message' => "<b>Error!</b> Task '$title' <b>already exists</b>",
                'myTasks' => $myTasks,
            ];
        }
    }

    $myTasks[] = [ 'title' => $title, 'done' => 0 ];
    file_put_contents(TASKS_FILE_NAME, json_encode($myTasks));

    return [
        'success' => true,
        'message' => "<b>Success!</b> Task '$title' <b>created!</b>",
        'myTasks' => $myTasks,
    ];
}

function deleteTask(array $myTasks, string $taskIndex): array {
    $taskIndex = (int)$taskIndex;
    // get the title of the task
    $title = $myTasks[$taskIndex]['title'];
    // destroy the array item by key
    unset($myTasks[$taskIndex]);
    // reset my array keys
    $myTasks = array_values($myTasks);
    // write in the file
    file_put_contents(TASKS_FILE_NAME, json_encode($myTasks));
    return [
        'success' => true,
        'message' => "<b>Success!</b> Task '$title' <b>deleted!</b>",
        'myTasks' => $myTasks,
    ];
}

function markTaskAsDone(array $myTasks, string $taskIndex): array {
    $taskIndex = (int)$taskIndex;
    // get the title of the task
    $title = $myTasks[$taskIndex]['title'];
    // update the array item "done" key
    $myTasks[$taskIndex]['done'] = ($myTasks[$taskIndex]['done'] === 1) ? 0 : 1;
    // reset my array keys
    $myTasks = array_values($myTasks);
    // write in the file
    file_put_contents(TASKS_FILE_NAME, json_encode($myTasks));
    return [
        'success' => true,
        'message' => "<b>Success!</b> Task '$title' <b>marked as done!</b>",
        'myTasks' => $myTasks,
    ];
}