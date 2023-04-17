<?php
define('DB_SLOTS', __DIR__ . '/db/db_slots.json');

$slotsAvailabilities = [];

// read the filesystem slots
if (file_exists(DB_SLOTS)) {
  $fileContent = file_get_contents(DB_SLOTS);
  // transform it from string to array
  $slotsAvailabilities = json_decode($fileContent, true);
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="This is our booking application">
    <meta name="author" content="Jagaad Academy">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Our Booking App</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="static/booking-app.css" rel="stylesheet">
  </head>

  <body>

    <main role="main">

      <section class="jumbotron text-center">
        <div class="container">
          <h1 class="jumbotron-heading">The Booking Application</h1>
          <p class="lead text-muted">In this application you can easily book a co-working space :)</p>
        </div>
      </section>

      <div class="album py-5 bg-light">
        <div class="container">

          <div class="row">
            
          <?php foreach ($slotsAvailabilities as $slot): ?>
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" src="images/<?=random_int(1, 7)?>.jpg" alt="Card image cap">
                <div class="card-body">
                  <small class="text-muted" style="font-size: 10px">Room ID #<?=$slot['id']?></small>
                  <p class="card-text"><?=$slot['name']?></p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">

                      <?php if (!$slot['booked']): ?>
                        <button type="button" class="btn btn-md btn-primary">Book for $0</button>
                      <?php else: ?>
                        <span class="badge text-bg-warning">Space not available</span>
                      <?php endif ?>

                    </div>
                    <small class="text-muted"><?=$slot['description']?></small>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
            
          </div>
        </div>
      </div>

    </main>

    <footer class="text-muted">
      <div class="container">
        <p class="float-right">
          <a href="#">Back to top</a>
        </p>
        <p>This in a booking application example where you can book a room for FREE!</p>
      </div>
    </footer>
  </body>
</html>
