<?php
  /* SESSION AND ERROR */
    session_start();
    
    if(isset($_GET["error"])){
        echo "<p style=\"color: red; font-size: 20px;\">" . $_GET["error"] . "</p>";
    }

  /* INCLUDE */
    include('../Model/read.php');

?>

<!DOCTYPE HTML>
<html>

  <head>
    <!--Integration CSS-->
      <link rel="stylesheet" href="Ellements/CSS/style.css">

  </head>

  <body>
    <h1>Hello User !</h1>
    <h2>thank you for your registration here is your information</h2>

  </body>
</html>