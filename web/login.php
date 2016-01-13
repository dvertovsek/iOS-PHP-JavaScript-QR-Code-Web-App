<?php
    if(isset($_GET["user"]))
    {
      include 'api/dbPDOController.php';
      $dbh = Db::getDBInstance();

      $user = htmlspecialchars_decode($_GET["user"]);

      $sql = "SELECT first_name, last_name, location FROM whatscrap.user WHERE username = :user;";
      $stmt = $dbh->prepare($sql);
      $stmt->bindParam(':user', $user);

      if($stmt->execute())
      {
        $row = $stmt->fetch();
      }
    }
?>
<!DOCTYPE html>
<html lang="hr">
  <head>
    <title>WhatsCrapp</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </head>
  <body>
    <div class="container">
      <div class="jumbotron">
        <?php if ($row) : ?>

          <h1><?= $user; ?></h1>

          <form class="form-horizontal" role="form">
            <div class="form-group">
              <label class="control-label col-sm-2" for="first_name">First name:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="first_name" value=<?= $row["first_name"]; ?> readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="last_name">Last name:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="last_name" value=<?= $row["last_name"]; ?> readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="location">Location:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="location" value=<?= $row["location"]; ?> readonly>
              </div>
            </div>
          </form>
        <?php endif ?>
        <p>Welcome!</p>
  </body>
</html>
