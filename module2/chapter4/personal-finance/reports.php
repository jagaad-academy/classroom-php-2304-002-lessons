<?php 
require_once __DIR__ . '/boot.php';
protectPage();

$type = filter_input(INPUT_GET, 'type');

$reportTypes = [
   '' => 'Select the report type',
   'top_five' => 'Top 5 Biggest Transactions',
   'interval_by_account' => 'Transactions By Account',
];

define('PAGE_TITLE', 'Reports');
require_once __DIR__ . '/views/header.php' 
?>

<form action="reports.php" method="get">
    <select name="type" required>
        <?php foreach ($reportTypes as $key => $reportType): ?>
            <option value="<?=$key?>" <?=($type === $key) ? 'selected' : ''?>><?=$reportType?></option>
        <?php endforeach ?>
    </select>

    <button type="submit">Go</button>
</form>

<?php if ($type === 'top_five'): ?>

    <?php require_once __DIR__ . '/views/reports/top-five.php'; ?>

<?php elseif ($type === 'interval_by_account'): ?>

    <?php require_once __DIR__ . '/views/reports/interval-by-account.php'; ?>

<?php else: ?>

    <br />
    <i>The report will be loaded here. :D</i>

<?php endif ?>

<?php
require_once __DIR__ . '/views/footer.php';
?>