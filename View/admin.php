<?php

  /* SESSION AND ERROR */
    session_start();
    
    if(isset($_GET["error"])){
        echo "<p style=\"color: red; font-size: 20px;\">" . $_GET["error"] . "</p>";
    }

  /* INCLUDE */
    include('../Model/read.php');

  /* Load All Data For TABLE */
    $postalCode = TakeAllPostalCode();
    $locomotion = TakeAllLocomotion();
    $workDepartement = TakeAllWorkDepartement();
    $activity = TakeAllActivity();

  /* VAR DUMP FOR CHECK IF ALL QUERY TO DATABASE IS CORRECT */
  /* ALL IS ARRAY */
    var_dump($postalCode[0]);
    var_dump($locomotion[0]);
    var_dump($workDepartement[0]);
    var_dump($activity[0]);
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