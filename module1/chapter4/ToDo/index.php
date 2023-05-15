<?php

print_r($_POST);

$tasks = [];

if (!empty($_POST['taskIdentifier'])) {
    foreach ($_POST['taskIdentifier'] as $key => $taskIdentifier) {
        $tasks[$taskIdentifier] = $_POST['taskIdentifierStatus'][$key];
    }
}


if (isset($_POST)) {
    $newTaskName = $_POST['title'] ?? '';

    //Actions
    if (isset($_POST['add-task']) && $_POST['add-task'] == 1) {
        if (!empty($newTaskName)) {
            $tasks[$newTaskName] = 'not-done';
        }
    } else if (isset($_POST['clear-tasks']) && $_POST['clear-tasks'] == 1) {
        $tasks = [];
    } else if (isset($_POST['remove-task']) && !empty($_POST['remove-task'])) {
        $taskToRemove = $_POST['remove-task'];
        if (array_key_exists($taskToRemove, $tasks)) {
            unset($tasks[$taskToRemove]);
        }
    } else if (isset($_POST['task-done']) && !empty($_POST['task-done'])){
        $taskToBeMarkedAsDone = $_POST['task-done'];
        if (array_key_exists($taskToBeMarkedAsDone, $tasks)) {
            $tasks[$taskToBeMarkedAsDone] = 'done';
        }
    }
}

?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>To Do list</title>
    <meta name="description" content="First web-application.">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<form name="task-form" method="post" action="index.php">
    <div class="container">
        <div id="task-form" class="header">
            <h2>My To Do List</h2>
            <input type="text" name="title" placeholder="Title...">
            <button type="submit" name="add-task" value="1" class="addBtn">Add</button>
            <input type="hidden" name="taskIndex" value="#"/>
            <?php
            foreach ($tasks as $name => $status) {
                echo "<input type=\"hidden\" name=\"taskIdentifier[]\" value=\"$name\"/>";
                echo "<input type=\"hidden\" name=\"taskIdentifierStatus[]\" value=\"$status\"/>";
            }
            ?>
            <button type="submit" name="clear-tasks" value="1" class="addBtn">Clear</button>
        </div>

        <ul id="task-list">
            <?php foreach ($tasks as $name => $status) { ?>
                <?php if($status == 'done') {?>
                    <li class="checked">
                <?php } else { ?>
                    <li>
                <?php } ?>
                        <?php echo $name; ?>
                        <button type="submit" name="remove-task" value="<?php echo $name; ?>" style="margin-left: 5rem" class=\"close\">×</button>
                        <button type="submit" name="task-done" value="<?php echo $name; ?>" style="margin-left: 1rem" class=\"close\">V</button>
                    </li>
            <?php } ?>
        </ul>
    </div>
</form>
</body>
