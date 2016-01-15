<?php

    if(isset($_POST["username"]))
    {
      include 'dbPDOController.php';
      $dbh = Db::getDBInstance();

      $user = htmlspecialchars($_POST["username"]);
      $first_name = htmlspecialchars($_POST["first_name"]);
      $last_name = htmlspecialchars($_POST["last_name"]);
      $location = htmlspecialchars($_POST["location"]);

      $sql = "INSERT INTO whatscrap.user(username,first_name,last_name,location) VALUES (:user, :first_name, :last_name, :location);";
      $stmt = $dbh->prepare($sql);
      $stmt->bindParam(':user', $user);
      $stmt->bindParam(':first_name', $first_name);
      $stmt->bindParam(':last_name', $last_name);
      $stmt->bindParam(':location', $location);

      $stmt->execute();
    }
    else{
      echo "add a new user!";
    }

?>
