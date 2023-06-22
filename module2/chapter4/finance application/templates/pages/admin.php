<?php
require_once __DIR__ . '/../header.php';
require_once __DIR__ . '/../navigation.php';
require_once __DIR__ . '/../main.php';
?>

<div class="row mt-5">
    <div class="col-12 text-center">
        <h1>Administration page</h1>
    </div>
</div>
<div class="row mt-5">
    <div class="col-12">
        <h2>Incomes administration</h2>
        <ul>
            <li><a href="/incomes">List of incomes</a></li>
            <li><a href="/incomes/create">Create an income</a></li>
            <li><a href="/revenue/incomes">Revenue of incomes</a></li>
        </ul>
    </div>
</div>
<div class="row mt-5">
    <div class="col-12">
        <h2>Expenses administration</h2>
        <ul>
            <li><a href="/expenses">List of expenses</a></li>
            <li><a href="/expenses/create">Create an expense</a></li>
            <li><a href="/revenue/expenses">Revenue of expenses</a></li>
        </ul>
    </div>
</div>

<?php
require_once __DIR__ . '/../footer.php';
?>
