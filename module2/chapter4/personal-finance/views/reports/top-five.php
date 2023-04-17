<?php
$rows = top5BiggestTransactions();
?>
<h3>Top 5 Biggest Transactions</h3>

<table border="1">
    <thead>
        <tr>
            <th>Type</th>
            <th>Category</th>
            <th>Amount</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($rows as $row): ?>
            <tr>
                <td><?=$row['type']?></td>
                <td><?=$row['category']?></td>
                <td><?=$row['total']?></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>