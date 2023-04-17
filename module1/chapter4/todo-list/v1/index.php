<?php

/*
if (isset($_POST['title'])) {
    echo '<pre>';
    var_dump($_POST);
    echo '<br>------------------------------<br>';
    die;
}
*/

$filename = 'db.csv';
$myTasks = [];

// read the file if it exists
if (file_exists($filename)) {
    // open the file and read each row
    $fo = fopen($filename, 'r');
    while ($row = fgets($fo)) {
        $rowList = explode(',', trim($row));
        
        $myTasks[] = [
            'title' => $rowList[0],
            'done' => (int)$rowList[1],
        ];
    }
    fclose($fo);
}

// add a new task
if (isset($_POST['action']) && $_POST['action'] === 'add-task') {
    $myTasks[] = [
        'title' => $_POST['title'],
        'done' => 0,
    ];

    // write the $myTasks array to the csv
    $fo = fopen($filename, 'w+');
    foreach ($myTasks as $task) {
        // implode: "Task N,1"
        $newTask = implode(',', $task);
        fputs($fo, $newTask . PHP_EOL);
    }
    fclose($fo);
}

// delete a task
if (isset($_POST['action']) && $_POST['action'] === 'delete-task') {
    $taskIndex = (int)$_POST['taskIndex'];
    unset($myTasks[$taskIndex]);

    // reset my array keys
    $myTasks = array_values($myTasks);

    // write the $myTasks array to the csv
    $fo = fopen($filename, 'w+');
    foreach ($myTasks as $task) {
        // implode: "Task N,1"
        $newTask = implode(',', $task);
        fputs($fo, $newTask . PHP_EOL);
    }
    fclose($fo);
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
                    × delete
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
        if (event.target.tagName === 'SPAN') {
            // getting the value of the input under the clicked SPAN
            let key = event.target.querySelector('input[name=taskClickedKey]').value

            //inputTitle.value = 'trying to delete key: ' + key
            inputTaskIndex.value = key
            inputAction.value = 'delete-task'

            //alert('You are trying to delete a task: ' + key)
            form.submit()
        }
    })
</script>
