<?php

require_once __DIR__ . '/modules/alert-message.php';

require_once __DIR__ . '/modules/slots-storage.php';

$isAuthenticated = isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;

if (! $isAuthenticated) {
  echo 'Not authorized :/';
  echo <<<HTML
  <meta http-equiv="refresh" content="2; url='/login.php'" />
  HTML;
  die;
}

try {
  // replace this by the SQL query
  $slotsAvailabilities = getSlots();
} catch (\Exception $exception) {
  // error handling
  storeAlertMessage('<b>Error!</b> Something went wrong while loading the data! :/', ALERT_MSG_ERROR);
  // empty slots to avoid errors
  $slotsAvailabilities = []; 
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Admin | Booking Application</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <!-- Custom styles for this template -->
    <link href="static/starter-template.css" rel="stylesheet">
  </head>

  <body>

  <nav class="navbar navbar-expand-lg bg-light">
    <div class="container">
      <a class="navbar-brand" href="index.php">Admin | Booking Application</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Manage Slots</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="/action/singout.php">Log out</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <main class="flex-shrink-0">
    <div class="container">
      <h1 class="mt-5">Slots</h1>

      <p class="lead">Manage your slots availability here.</p>

      <?php if (hasAlertStatus(ALERT_MSG_SUCCESS)): ?>
        <div class="alert alert-success" role="alert" style="width: 600px;">
          <?=extractAlertMessage()?>
        </div>
      <?php endif ?>

      <?php if (hasAlertStatus(ALERT_MSG_ERROR)): ?>
        <div class="alert alert-danger" role="alert" style="width: 600px;">
          <?=extractAlertMessage()?>
        </div>
      <?php endif ?>

      <div class="row align-items-start">
        
        <?php if ($_SESSION['user_role'] === 'admin'): ?>

        <div class="col">
          <form class="row g-3" method="post" action="/action/add-slot.php">
            <div class="col-auto">
              <label for="inputName" class="visually-hidden">Name</label>
              <input type="text" name="slotName" class="form-control" id="inputName" placeholder="Name" required>
            </div>
            <div class="col-auto">
              <label for="inputDescription" class="visually-hidden">Description</label>
              <input type="text" name="slotDescription" class="form-control" id="inputDescription" size="30" placeholder="Description" required>
            </div>
            <div class="col-auto">
              <label for="formFile" class="visually-hidden">Image</label>
              <input class="form-control" type="file" id="formFile" disabled>
            </div>
            <div class="col-auto">
              <button type="submit" class="btn btn-primary mb-3">Create Slot</button>
            </div>
          </form>
          <hr />
        </div>

        <?php endif ?>

        <table class="table">
          <thead>
            <tr>
              <th scope="col" width="150">#</th>
              <th scope="col">Name</th>
              <th scope="col">Description</th>
              <th scope="col">Status</th>
              <th scope="col"></th>

              <?php if ($_SESSION['user_role'] === 'admin'): ?>
                <th scope="col">Delete</th>
              <?php endif ?>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($slotsAvailabilities as $slot): ?>
              <tr>
                <th scope="row"><small class="text-muted"><?=$slot['id']?></small></th>
                <td><?=$slot['name']?></td>
                <td><?=$slot['description']?></td>

                <td>
                  <?php if ((bool)$slot['booked'] === true): ?>
                    <h5><span class="badge bg-secondary">Booked</span></h5>
                  <?php else: ?>
                    <h5><span class="badge bg-success">Free</span></h5>
                  <?php endif ?>
                </td>

                <td>
                  <a class="btn btn-sm btn-primary" href="/action/switch-slot.php?id=<?=$slot['id']?>">
                    <i class="bi bi-toggle-on"></i> Switch status
                  </a>
                </td>
                
                <?php if ($_SESSION['user_role'] === 'admin'): ?>
                <td>
                  <a class="btn btn-sm btn-danger" href="/action/delete-slot.php?id=<?=$slot['id']?>">
                    <i class="bi bi-trash"></i>
                  </a>
                </td>
                <?php endif ?>
              </tr>
            <?php endforeach ?>
            <!--
            <tr>
              <th scope="row">2</th>
              <td>Room #2</td>
              <td>Private room for a single person.</td>
              <td><h5><span class="badge bg-success">Free</span></h5></td>
              <td><button type="button" class="btn btn-sm btn-primary"><i class="bi bi-toggle-on"></i> Switch to booked</button></td>
              <td><button type="button" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button></td>
            </tr>
            <tr>
              <th scope="row">3</th>
              <td>Shared Office #3</td>
              <td>Shared Office to work togheter with five people.</td>
              <td><h5><span class="badge bg-success">Free</span></h5></td>
              <td><button type="button" class="btn btn-sm btn-primary"><i class="bi bi-toggle-on"></i> Switch to booked</button></td>
              <td><button type="button" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button></td>
            </tr>
            -->
          </tbody>
        </table>

        <?php if (count($slotsAvailabilities) === 0): ?>
          <div class="text-center">No slots found :/<div>
        <?php endif ?>
      </div>
    </div>
  </main>

  </body>
</html>
