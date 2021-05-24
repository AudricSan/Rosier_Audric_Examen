<?php

  /* SESSION AND ERROR */
    session_start();
    
    if(isset($_GET["error"])){
        echo $_GET["error"] . " !";
    }

  /* INCLUDE */
    include('../../../Model/read.php');

?>

<!DOCTYPE HTML>
<html>

  <head>
    <!--Integration CSS-->
      <link rel="stylesheet" href="Ellements/CSS/style.css">

  </head>

  <body>
    <h2>Admin Register</h2>
    <form action="../../../controller/adminregister.php" method="post">
        <p>
        <label for="login">Login : </label>
        <input type="text"  name="login" />
        </p>

        <p>
        <label for="pass">Password : </label>
        <input type="password"  name="pass"/>
        </p>
        
        <input type="submit" value="Connexion" /><br>
    </form>

  </body>
</html>