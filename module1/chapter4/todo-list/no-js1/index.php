<?php
define('FILE_STORAGE', 'db.json');

$myTasks = [];

// get the file content and transform to array of $myTasks
if (file_exists(FILE_STORAGE)) {
    $fileContent = file_get_contents(FILE_STORAGE);
    $myTasks = json_decode($fileContent, true);
}
?>
<h1>My To-Do List</h1>

<fieldset >
    <legend>Add Task</legend>
    <form action="add_task.php" method="post">
        <input type="text" name="title" required/>
        <button type="submit">Add</button>
    </form>
</fieldset>

<hr />

<!-- Form to update a task (delete or mark as done) -->
<form action="update_task.php" method="post">
    <table border="1" width="500">
        <thead>
            <tr height="40">
                <th colspan="4">List of tasks</th>
            </tr>
            <tr height="40">
                <th></th>
                <th>Title</th>
                <th>Done</th>
                <th>Edit</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($myTasks as $key => $task): ?>
            <tr height="30">
                <td width="25">
                    <input type="radio" name="taskIndex" value="<?=$key?>" required/>
                </td>
                <td><?=$task['title']?></td>
                <td><?=$task['done'] ? 'Yes' : 'No' ?></td>
                <td><a href="edit_form.php?id=<?=$task['id']?>">Edit</a></td>
            </tr>
            <?php endforeach ?>
        </tbody>

        <tfoot>
            <tr>
                <th colspan="4" align="right">
                    <select name="action" required>
                        <option value=""></option>
                        <option value="delete">Delete</option>
                        <option value="done">Mark as done</option>
                    </select>

                    <button type="submit">Update</button>
                </th>
            </tr>
        </tfoot>
    </table>
</form>