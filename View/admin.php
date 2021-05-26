<?php
  /* Start Session and Include Read Files */
    session_start();
    include('../Model/read.php');
    include('../Model/function.php');

  /* set error */
    $error = '';
    $path = 'index.php';

  /* redefining variables in post */  
    $AdminId = $_SESSION['Admin_ID'];

  /* Check if you're connected or not */
    if($AdminId = 0){
      $error = 'NON CONNECTER EN AMDIN';
      header("Location: ../view/$path?error=$error");
    }

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