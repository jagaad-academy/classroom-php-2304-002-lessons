<?php
require_once __DIR__ . '/../../header.php';
require_once __DIR__ . '/../../navigation.php';
require_once __DIR__ . '/../../main.php';
?>

<div class="row mt-5">
    <div class="col-12">
        <h1>List of incomes</h1>
    </div>
</div>
<div class="row my-5">
    <div class="col-12">
        <?php
         if(count($expenses) > 0){
        ?>
        <table class="table">
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
            <?php foreach ($expenses as $income) {
                echo "<tr>";
                echo "<td>" . $income['name'] . "</td>";
                echo "<td>" . $income['category_id'] . "</td>";
                echo "<td>" . $income['account_id'] . "</td>";
                echo "<td>" . $income['date'] . "</td>";
                echo "<td>" . $income['periodicity'] . "</td>";
                echo "<td>" . $income['status'] . "</td>";
                echo "<td>" . $income['user_id'] . "</td>";
                echo "<td><a href='/incomes/delete/id/".$income['income_id']."'>Delete</a>
                        <a href='/incomes/update/id/".$income['income_id']."' class='ml-2'>Update</a>
                        </td>";
                echo "</tr>";
            }
            ?>
            </tbody>
        </table>
        <?php
        } else {
         ?>
             No incomes found.
        <?php
        }
        ?>
    </div>
</div>


<?php
require_once __DIR__ . '/../../footer.php';
?>
