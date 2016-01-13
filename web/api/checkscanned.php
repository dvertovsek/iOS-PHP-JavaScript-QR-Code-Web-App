<?php

    if(isset($_GET["code"]))
    {
      include 'dbPDOController.php';
      $dbh = Db::getDBInstance();

      $code = htmlspecialchars_decode($_GET["code"]);

      $sql = "SELECT code, coalesce(username,'100') AS username,first_name, last_name, location FROM whatscrap.code LEFT JOIN whatscrap.user USING(username) WHERE code = :code;";
      $stmt = $dbh->prepare($sql);
      $stmt->bindParam(':code', $code);

      if($stmt->execute())
      {
        $row = $stmt->fetch();
        if($row["username"] != 100)
        {
          $stmt = $dbh->prepare("DELETE FROM whatscrap.code WHERE code = :code");
          $stmt->bindParam(':code', $code);
          $stmt->execute();
        }
        echo json_encode(array('username' => $row["username"],
                              'code' => $row["code"],
                              'first_name' =>  $row["first_name"],
                              'last_name' => $row["last_name"],
                              'location' => $row["location"]
                            ));
      }
    }
    else{
      echo "check if code is scanned!";
    }

?>
