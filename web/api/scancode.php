<?php

    if(isset($_POST["username"]))
    {
      include 'dbPDOController.php';
      $dbh = Db::getDBInstance();

      $user = htmlspecialchars($_POST["username"]);
      $code = htmlspecialchars($_GET["code"]);

      $sql = "UPDATE whatscrap.code SET username = :user WHERE code = :code;";
      $stmt = $dbh->prepare($sql);
      $stmt->bindParam(':user', $user);
      $stmt->bindParam(':code', $code);

      $stmt->execute();
    }
    else{
      echo "scan code!";
    }

?>
