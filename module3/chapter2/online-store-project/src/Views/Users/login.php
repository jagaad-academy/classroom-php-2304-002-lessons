<div class="offset-2 col-6">
    <?php
    if(isset($data->error)){ ?>
        <div class="alert alert-danger" role="alert">
            <?=$data->error?>
        </div>
        <?php
    }
    ?>
    <form action="/login" method="post">
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email" required aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary">Log in</button>
    </form>
</div>
