<?php

/*
if (isset($_POST['action'])) {
    echo '<pre>';
    var_dump($_POST);
    echo '<br>------------------------------<br>';
    die;
}
*/

define('TASKS_FILE_NAME', 'db.json');

$myTasks = [];

// read the file if it exists
if (file_exists(TASKS_FILE_NAME)) {
    $fileContent = file_get_contents(TASKS_FILE_NAME);
    $myTasks = json_decode($fileContent, true);
}

// add a new task
if (isset($_POST['action']) && $_POST['action'] === 'add-task') {
    $myTasks = addNewTask($myTasks, $_POST['title']);
}

// delete a task
if (isset($_POST['action']) && $_POST['action'] === 'delete-task') {
    $myTasks = deleteTask($myTasks, $_POST['taskIndex']);
}

// mark task as done
if (isset($_POST['action']) && $_POST['action'] === 'marked-task') {
    $myTasks = markTaskAsDone($myTasks, $_POST['taskIndex']);
}

function addNewTask(array $myTasks, string $title): array {
    $myTasks[] = [
        'title' => $title,
        'done' => 0,
    ];

    $myTasksAsString = json_encode($myTasks);
    file_put_contents(TASKS_FILE_NAME, $myTasksAsString);

    return $myTasks;
}

function deleteTask(array $myTasks, string $taskIndex): array {
    $taskIndex = (int)$taskIndex;
    // destroy the array item by key
    unset($myTasks[$taskIndex]);

    // reset my array keys
    $myTasks = array_values($myTasks);

    $myTasksAsString = json_encode($myTasks);
    file_put_contents(TASKS_FILE_NAME, $myTasksAsString);

    return $myTasks;
}

function markTaskAsDone(array $myTasks, string $taskIndex): array {
    $taskIndex = (int)$taskIndex;
    // update the array item "done" key
    $myTasks[$taskIndex]['done'] = ($myTasks[$taskIndex]['done'] === 1) ? 0 : 1;

    // reset my array keys
    $myTasks = array_values($myTasks);

    $myTasksAsString = json_encode($myTasks);
    file_put_contents(TASKS_FILE_NAME, $myTasksAsString);

    return $myTasks;
}
?>
<link rel="stylesheet" href="style.css">

<div class="container">
    <div id="task-form" class="header">
        <form name="task-form" method="post" action="index.php">
            <h2>My To Do List</h2>
            <input type="text" name="title" placeholder="Title...">
            <button type="submit" class="addBtn">Add</button>
            <input type="hidden" name="taskIndex" value="#" />
            <input type="hidden" name="action" value="add-task" />
        </form>
    </div>

    <ul id="task-list">
        <?php
        /*foreach ($myTasks as $item) {
            echo "<li>$item <span class='close'>×</span></li>";
        }*/
        ?>


        <?php foreach ($myTasks as $key => $task): ?>
            <?php
            /*if ($task['done'] === 1) {
                $checked = 'class="checked"';
            } else {
                $checked = '';
            }*/
            // ternary-operator
            // https://www.w3schools.in/php/operators/ternary-operator
            $checked = ($task['done'] === 1) ? 'class="checked"' : '';
            ?>
            <li <?=$checked?>>
                <?=$task['title']?>
                <span class='close'>
                    ×
                    <input type="hidden" name="taskClickedKey" value="<?=$key?>" />
                </span>
            </li>
        <?php endforeach ?>
        


        <!--<li class="checked">Workout <span class="close">×</span></li>
        <li>Shopping <span class="close">×</span></li>
        <li>My other task <span class="close">×</span></li>-->
    </ul>
</div>

<script>
    let list = document.querySelector('ul')
    let form = document.querySelector('form[name=task-form]')

    //let inputTitle = form.querySelector('input[name=title]')
    let inputTaskIndex = form.querySelector('input[name=taskIndex]')
    let inputAction = form.querySelector('input[name=action]')

    list.addEventListener('click', function (event) {
        // make sure the user clicked in the SPAN tag
        if (event.target.tagName === 'SPAN') {
            // getting the value of the input under the clicked SPAN
            let key = event.target.querySelector('input[name=taskClickedKey]').value

            //inputTitle.value = 'trying to delete key: ' + key
            inputTaskIndex.value = key
            inputAction.value = 'delete-task'

            //alert('You are trying to delete a task: ' + key)
            form.submit()
        } 
        // make sure the user clicked in the LI tag
        else if (event.target.tagName === 'LI') {
            // getting the value of the input under the clicked SPAN
            let key = event.target.querySelector('input[name=taskClickedKey]').value

            //inputTitle.value = 'trying to delete key: ' + key
            inputTaskIndex.value = key
            inputAction.value = 'marked-task'

            //alert('You are trying to delete a task: ' + key)
            form.submit()
        }
    })
</script>
