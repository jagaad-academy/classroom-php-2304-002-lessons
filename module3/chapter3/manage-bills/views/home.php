<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manage Bills</title>
</head>
<body>

<h1>Manage Bills</h1>

<form action="/index.php?action=create-bill" method="post">
    <label>Name:<br>
        <input name="name" placeholder="Name" type="text" />
    </label>
    <br>

    <label>Description:<br>
        <input name="description" placeholder="Description" type="text" />
    </label>
    <br>
    <br>

    <button type="submit">Submit</button>
</form>

<hr />

<table border="1">
    <tr>
        <th>Name</th>
        <th>Description</th>
        <th>Paid</th>
    </tr>

    <?php
    /** @var \ManageBills\Entity\Bill $bill */
    foreach ($bills as $bill):
    ?>
        <tr>
            <td><?=$bill->name()?><br></td>
            <td><?=$bill->description()?><br></td>
            <td>
                <?=
                $bill->isPaid()
                    ? "Yes <small>({$bill->paidDate()?->format('M/d/Y H:i')})</small>"
                    : "<a href='/index.php?action=pay&id={$bill->id()}'>Pay</a>"
                ?>
            </td>
        </tr>
    <?php endforeach ?>
</table>



</body>
</html>