<?php
require_once __DIR__ . '/../../header.php';
require_once __DIR__ . '/../../navigation.php';
require_once __DIR__ . '/../../main.php';
?>

<div class="row mt-5">
    <div class="col-12">
        <h1>List of expenses</h1>
    </div>
</div>
<div class="row my-5">
    <div class="col-12">
        <?php
         if(count($expenses) > 0){
        ?>
        <table  class="table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Category</th>
                <th>Account</th>
                <th>Date</th>
                <th>Periodicity</th>
                <th>Status</th>
                <th>User</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($expenses as $expense) {
                echo "<tr>";
                echo "<td>" . $expense['name'] . "</td>";
                echo "<td>" . $expense['category_id'] . "</td>";
                echo "<td>" . $expense['account_id'] . "</td>";
                echo "<td>" . $expense['date'] . "</td>";
                echo "<td>" . $expense['periodicity'] . "</td>";
                echo "<td>" . $expense['status'] . "</td>";
                echo "<td>" . $expense['user_id'] . "</td>";
                echo "<td><a href='/expenses/delete/id/".$expense['expense_id']."'>Delete</a>
                        <a href='/expenses/update/id/".$expense['expense_id']."' class='ml-2'>Update</a>
                        </td>";
                echo "</tr>";
            }
            ?>
            </tbody>
        </table>
        <?php
        } else {
             ?>
             No expenses found.
        <?php
        }
        ?>
    </div>
</div>


<?php
require_once __DIR__ . '/../../footer.php';
?>
