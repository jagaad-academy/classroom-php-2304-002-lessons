<?php
require_once __DIR__ . '/../../header.php';
require_once __DIR__ . '/../../navigation.php';
require_once __DIR__ . '/../../main.php';
?>

<div class="row mt-5">
    <div class="col-12">
        <h1>Create an income</h1>
    </div>
</div>
<div class="row my-5">
    <div class="col-12">
        <form action="#" method="post">
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name">
                </div>
            </div>
            <div class="form-group row">
                <label for="categories" class="col-sm-2 col-form-label">Category</label>
                <div class="col-sm-10">
                    <select name="categories" id="categories" class="form-control">
<!--                        <option value=""></option>-->
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="accounts" class="col-sm-2 col-form-label">Account</label>
                <div class="col-sm-10">
                    <select name="accounts" id="accounts" class="form-control">
<!--                        <option value=""></option>-->
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="date" class="col-sm-2 col-form-label">Date</label>
                <div class="col-sm-10">
                    <input type="date" name="date" id="date" class="form-control">
                </div>
            </div>
            <fieldset class="form-group row">
                <legend class="col-form-label col-sm-2 float-sm-left pt-0">Periodicity</legend>
                <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="periodicity" id="periodicity1" value="0" >
                        <label class="form-check-label" for="periodicity1">
                            No
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="periodicity" id="periodicity2" value="1">
                        <label class="form-check-label" for="periodicity2">
                            Fixed
                        </label>
                    </div>
                    <div class="form-check disabled">
                        <input class="form-check-input" type="radio" name="periodicity" id="periodicity3" value="2">
                        <label class="form-check-label" for="periodicity3">
                            Installments
                        </label>
                    </div>
                </div>
            </fieldset>
            <fieldset class="form-group row">
                <legend class="col-form-label col-sm-2 float-sm-left pt-0">Status</legend>
                <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="status1" value="0" >
                        <label class="form-check-label" for="status1">
                            Unreceived
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="status2" value="1">
                        <label class="form-check-label" for="status2">
                            Received
                        </label>
                    </div>
                </div>
            </fieldset>
            <div class="form-group row">
                <label for="user-email" class="col-sm-2 col-form-label">User email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="user-email" name="user-email">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary" name="income-create">Create</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php
require_once __DIR__ . '/../../footer.php';
?>
