<?php

//Include the file every time
//require "functions.php";
//include "functions.php";

//Includes the file one time

/**
 * Including back-end functions
 */
require_once "back-end/app.php";

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
            <?php foreach ($tasks as $task) { ?>
                <?php if (trim(strtolower($task['status'])) == "done") { ?>
                    <li class="checked">
                <?php } else { ?>
                    <li>
                <?php } ?>
                <?php echo $task['taskName']; ?>
                <button type="submit" name="remove-task" value="<?php echo $task['taskName']; ?>" style="margin-left: 5rem"
                        class=\"close\">×
                </button>
                <button type="submit" name="task-done" value="<?php echo $task['taskName']; ?>" style="margin-left: 1rem"
                        class=\"close\">V
                </button>
                </li>
            <?php } ?>
        </ul>
    </div>
</form>
</body>
