<div class="offset-2 col-6">
    <?php
    if (isset($data->error)) { ?>
        <div class="alert alert-danger" role="alert">
            <?= $data->error ?>
        </div>
        <?php
    }
    ?>
    <?php
    if (isset($data->success)){ ?>
    <div class="alert alert-success" role="alert">
        <?= $data->success ?>
    </div>
<?php
}
    ?>
</div>
<div class="col-12">

<?php
    if(count($data->products) > 0) {
        ?>
    <div class="row">
    <?php
        foreach ($data->products as $product) {
            require __DIR__ . "/../templates/productCart.php";
        }
    }
    ?>
    </div>
</div>
