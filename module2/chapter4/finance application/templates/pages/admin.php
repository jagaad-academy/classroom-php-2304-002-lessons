<?php
require_once __DIR__ . '/../header.php';
require_once __DIR__ . '/../navigation.php';
require_once __DIR__ . '/../main.php';
?>

<div class="row mt-5">
    <div class="col-12">
        <h1>Administration page</h1>
    </div>
</div>
<div class="row mt-5">
    <div class="col-12">
        <h2>Incomes administration</h2>
        <ul>
            <li><a href="incomes/create.php">Create an income</a></li>
        </ul>
    </div>
</div>
<div class="row mt-5">
    <div class="col-12">
        <h2>Expenses administration</h2>
        <ul>
            <li><a href="expenses/create.php">Create an expense</a></li>
        </ul>
    </div>
</div>

<?php
require_once __DIR__ . '/../footer.php';
?>
