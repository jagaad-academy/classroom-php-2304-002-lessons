<?php
redirectIfUserIsNotLoggedIn();

$function = getFunctionName();

try {
    $function();
} catch (Exception $e) {
    echo $e->getMessage();
    die;
}

function incomes(): void
{
    require_once __DIR__ . '/../templates/pages/revenue/incomes.php';
}

function expenses()
{
    require_once __DIR__ . '/../templates/pages/revenue/expenses.php';
}

//echo "<img src='/functions/generateGraph.php'>";
