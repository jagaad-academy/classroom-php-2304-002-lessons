<?php

/**
 * @var \OopTodoList\Model\Task[] $tasks
 */
return static function(array $tasks): string {
    $listTasksHtml = '';
    foreach ($tasks as $task) {
        $listTasksHtml .= <<<HTML
            <li>
                <input type="checkbox" />{$task->title()}
                <a href="index.php?id={$task->id()}&action=delete-task">Del</a>
            </li>
        HTML;
    }

    return <<<HTML
        <!doctype html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport"
                  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Todo-List</title>
        </head>
        <body>
        
        <h3>New Task</h3>
        
        <form action="/index.php" method="post">
            <input type="text" name="task_title" placeholder="Name of the task..." />
            <input type="hidden" name="action" value="create-task">
            <button type="submit">Add</button>
        </form>
        
        <hr />
        
        <h3>List of Tasks</h3>
        <ul>
            $listTasksHtml
        </ul>
        
        <button>Update</button>
        
        </body>
        </html>
    HTML;
};
