<?php

declare(strict_types=1);

//print_r($_POST);

$fileName = 'toslist';
$tasks = [];

function readFromFile(string $fileName): array
{
    $tasks = [];
    if (file_exists($fileName)) {
        $handle = fopen($fileName, "r");
        while (($line = fgets($handle)) !== false) {
            $resultingArray = explode(';', $line);
            $tasks[$resultingArray[0]] = $resultingArray[1];
        }
        fclose($handle);
    }

    return $tasks;
}

function addDataToFile(string $fileName, string $newTaskName): void
{
    if (is_writable($fileName)) {
        $handleToWrite = fopen($fileName, "a");
        if (!$handleToWrite) {
            echo "Cannot open the file!";
        } else {
            $newTaskName .= ";not-done\n";
            $writeResult = fwrite($handleToWrite, $newTaskName);
            if (!$writeResult) {
                echo "Cannot write to the file!";
            }
        }
        fclose($handleToWrite);
    }
}

function clearAndWriteTheFile(string $fileName, array $data): void
{
    $stringToInput = '';
    foreach ($data as $name => $status) {
        $stringToInput .= $name . ";" . $status;
    }
    $result = file_put_contents($fileName, $stringToInput);
    if ($result === false) {
        echo "Can't write to the file";
    }
}

if (!empty($_POST)) {
    $newTaskName = $_POST['title'] ?? '';

    //Actions
    //Add a task
    $tasks = readFromFile($fileName);
    if (isset($_POST['add-task']) && $_POST['add-task'] == 1) {
        if (!empty($newTaskName)) {
            addDataToFile($fileName, $newTaskName);
            $tasks[$newTaskName] = 'not-done';
        }
    } else if (isset($_POST['clear-tasks']) && $_POST['clear-tasks'] == 1) {
        //Clear all tasks
        $tasks = [];
        clearAndWriteTheFile($fileName, $tasks);
    } else if (isset($_POST['remove-task']) && !empty($_POST['remove-task'])) {
        //Remove one particular task
        $taskToRemove = $_POST['remove-task'];
        if (array_key_exists($taskToRemove, $tasks)) {
            unset($tasks[$taskToRemove]);
            clearAndWriteTheFile($fileName, $tasks);
        }
    } else if (isset($_POST['task-done']) && !empty($_POST['task-done'])) {
        //Mark a task as DONE
        $taskToBeMarkedAsDone = $_POST['task-done'];
        if (array_key_exists($taskToBeMarkedAsDone, $tasks)) {
            $tasks[$taskToBeMarkedAsDone] = 'done';
            clearAndWriteTheFile($fileName, $tasks);
        }
    }
} else {
    $tasks = readFromFile($fileName);
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
            <button type="submit" name="clear-tasks" value="1" class="addBtn">Clear</button>
        </div>

        <ul id="task-list">
            <?php foreach ($tasks as $name => $status) { ?>
                <?php if (trim(strtolower($status)) == "done") { ?>
                    <li class="checked">
                <?php } else { ?>
                    <li>
                <?php } ?>
                <?php echo $name; ?>
                <button type="submit" name="remove-task" value="<?php echo $name; ?>" style="margin-left: 5rem"
                        class=\"close\">×
                </button>
                <button type="submit" name="task-done" value="<?php echo $name; ?>" style="margin-left: 1rem"
                        class=\"close\">V
                </button>
                </li>
            <?php } ?>
        </ul>
    </div>
</form>
</body>
