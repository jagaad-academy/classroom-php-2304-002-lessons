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
require_once __DIR__ . "/productPage.php";
//require_once __DIR__ . "/relatedProduts.php";
