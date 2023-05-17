<?php

if (!empty($_POST)) {
    $newTaskName = $_POST['title'] ?? '';

//    match ($_POST['action']){
//        'add-task' => addTask($fileName, $newTaskName),
//        'clear-tasks' => clearAndWriteTheFileJSON($fileName),
//        'remove-task' => removeTask($fileName),
//        'task-done' => changeTaskStatus($fileName)
//    };

    //Actions
    if (isset($_POST['add-task']) && $_POST['add-task'] == 1) {
        //Add action
        addTask($fileName, $newTaskName);
    } else if (isset($_POST['clear-tasks']) && $_POST['clear-tasks'] == 1) {
        //Clear all tasks action
        clearAndWriteTheFileJSON($fileName);
    } else if (isset($_POST['remove-task']) && !empty($_POST['remove-task'])) {
        //Remove task action
        removeTask($fileName);
    } else if (isset($_POST['task-done']) && !empty($_POST['task-done'])) {
        //Change a status fot tast action
        changeTaskStatus($fileName);
    }

}

$tasks = readFromFileJSON($fileName);
