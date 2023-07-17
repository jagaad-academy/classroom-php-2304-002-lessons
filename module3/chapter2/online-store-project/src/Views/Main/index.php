<div class="col">
    <?php if(!empty($data->users)){
        foreach ($data->users as $user) {
            echo $user['email'] . "<br>";
        }
    }
    ?>
</div>
