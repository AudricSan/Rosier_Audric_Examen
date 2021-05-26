<?php

  /* SESSION AND ERROR */
  /* Start Session and Include Read Files */
    session_start();
    
    if(isset($_GET["error"])){
        echo "<p style=\"color: red; font-size: 20px;\">" . $_GET["error"] . "</p>";
    }

  /* INCLUDE */
    include('../Model/read.php');

  /* Load All Data For TABLE */
    $staff = TakeAllStaff();

  /* VAR DUMP FOR CHECK IF ALL QUERY TO DATABASE IS CORRECT */
  /* ALL IS ARRAY */
    var_dump($staff);
?>

<!DOCTYPE HTML>
<html>

  <head>
    <!--Integration CSS-->
      <link rel="stylesheet" href="Ellements/CSS/style.css">
  </head>

  <body>
    
  </body>
</html>