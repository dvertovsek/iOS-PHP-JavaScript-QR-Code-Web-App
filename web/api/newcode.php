<?php

    if(isset($_GET["newcode"]))
    {
      include 'dbPDOController.php';
      $dbh = Db::getDBInstance();

      $code = htmlspecialchars_decode($_GET["newcode"]);

      $sql = "INSERT INTO whatscrap.code(code,username) VALUES (:code, DEFAULT);";
      $stmt = $dbh->prepare($sql);
      $stmt->bindParam(':code', $code);

      if($stmt->execute())
      {
        echo json_encode(array('status' => '200','codeAdded' => $code));
      }
      else{
        echo json_encode(array('status' => '100'));
      }
    }
    else{
      echo "add a new code!";
    }

?>
