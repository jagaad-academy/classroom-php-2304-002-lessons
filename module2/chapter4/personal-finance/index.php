<?php 
require_once __DIR__ . '/boot.php';
protectPage();

$accounts = findAccounts();

define('PAGE_TITLE', 'Accounts');
require_once __DIR__ . '/views/header.php' 
?>

<?php if (hasAlertStatus(ALERT_MSG_ERROR)): ?>
<i><?=extractAlertMessage()?></i><br /><br />
<?php endif ?>

<?php if (hasAlertStatus(ALERT_MSG_SUCCESS)): ?>
<i><?=extractAlertMessage()?></i><br /><br />
<?php endif ?>

<form method="post" action="actions/create-account.php">
    <label>Name: </label><br />
    <input type="text" name="account_name" placeholder="Name" />
    <br />

    <label>Description: </label><br />
    <textarea name="account_description"></textarea>
    <br />

    <label>Type: </label><br />
    <select name="account_type" required>
        <option value=""></option>
        <option value="credit">Credit</option>
        <option value="debit">Debit</option>
    </select>
    <br />
    <br />

    <button type="submit">Create</button>
</form>

<hr />
<table border="1">
    <thead>
        <tr>
            <th width="50">ID</th>
            <th width="100">Name</th>
            <th width="300">Description</th>
            <th width="100">Type</th>
            <th width="100">Action</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($accounts as $account): ?>
        <tr>
            <td><?=$account['account_id']?></td>
            <td><?=$account['name']?></td>
            <td><?=$account['description']?></td>
            <td><?=$account['type']?></td>
            <td>
                <a href="actions/delete-account.php?account_id=<?=$account['account_id']?>">Delete</a>
            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>

<?php require_once __DIR__ . '/views/footer.php' ?>
