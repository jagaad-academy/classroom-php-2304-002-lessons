<?php
require_once __DIR__ . '/action.php';
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
    .container {
        margin-top: 40px;
        max-width: 600px;
    }
</style>

<!--<link rel="stylesheet" href="style.css">-->

<div class="container container-sm">
    <div id="task-form" class="header">
        <form name="task-form" method="post" action="index.php">
            <h2>My To-Do List App</h2>
            
            <!-- show the success message -->
            <?php if ($response !== null && $response['success'] === true): ?>
                <div class="alert alert-success" role="alert"><?=$response['message']?></div>
            <?php endif ?>

            <!-- show the error message -->
            <?php if ($response !== null && $response['success'] === false): ?>
                <div class="alert alert-danger" role="alert"><?=$response['message']?></div>
            <?php endif ?>
            
            <div class="input-group">
                <input type="text" name="title" placeholder="Title..." class="form-control" />
                <button type="submit" class="btn btn-primary">Add</button>
                <input type="hidden" name="taskIndex" value="#" />
                <input type="hidden" name="action" value="add-task" />
            </div>
        </form>
    </div>

    <ul id="task-list" class="list-group">
        <?php foreach ($myTasks as $key => $task): ?>
            <a href="#" class="list-group-item d-flex justify-content-between align-items-center list-group-item-action <?=($task['done'] ? 'list-group-item-secondary text-decoration-line-through' : '')?>">
                <?=($task['done'] ? '✅' : '')?>
                <?=$task['title']?> 
                <span class="btn btn-sm btn-danger fa-solid fa-ban">
                    <input type="hidden" name="taskClickedKey" value="<?=$key?>" />
                </span>
            </a>
        <?php endforeach ?>
    </ul>
</div>

<script src="script.js"></script>