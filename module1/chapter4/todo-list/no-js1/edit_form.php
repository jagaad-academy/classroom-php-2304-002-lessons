<?php
define('FILE_STORAGE', 'db.json');

$myTasks = [];

// get the file content and transform to array of $myTasks
if (file_exists(FILE_STORAGE)) {
    $fileContent = file_get_contents(FILE_STORAGE);
    $myTasks = json_decode($fileContent, true);
}

$foundTask = null;
foreach ($myTasks as $task) {
    if ($task['id'] === $_GET['id']) {
        $foundTask = $task;
        break;
    }
}
?>
<h1>You're editing task "<?=$foundTask['title']?>"</h1>

<fieldset >
    <legend>Edit Task</legend>
    <form action="edit_action.php" method="post">
        <input type="hidden" name="id" value="<?=$foundTask['id']?>" />
        <input type="text" name="title" value="<?=$foundTask['title']?>" required/>
        <button type="submit">Save</button>
    </form>
</fieldset>

<hr />

<a href="index.php"><< Homepage</a>