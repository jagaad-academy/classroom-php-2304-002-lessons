<div class="offset-2 col-6">
    <?php
    if(isset($data->error)) { ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $data->error?>
        </div>
        <?php
    }
    ?>
    <h1>Create your account</h1>
    <form action="/register" method="post">
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email" required aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" class="form-control" id="address" name="address" required>
        </div>
        <button type="submit" class="btn btn-primary">Sign up</button>
    </form>
</div>
