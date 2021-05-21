<?php
/*
    session_start();
    if(isset($_GET["error"])){
        echo $_GET["error"] . " !";
    }

    isset($_SESSION["notok"]["name"]) ? $name = $_SESSION["notok"]["name"] : $name='';
    isset($_SESSION["notok"]["email"]) ? $email = $_SESSION["notok"]["email"] : $email='';
    isset($_SESSION["notok"]["naiss"]) ? $naissance = $_SESSION["notok"]["naiss"] : $naissance='';
    isset($_SESSION["notok"]["pseudo"]) ? $pseudo = $_SESSION["notok"]["pseudo"] : $pseudo='';

*/

$name = 0;
$firstname = 0;
$mail = 0;
$postalcode = 0;
$locomotion = 0;
$departement = 0;
$activity = 0;
$eating = 0;

?>


<h1>The staff day!</h1>
<h2>Registration </h2>
  <form action="../controller/signup.php" method="post">
    <p>
      <label for="name">Name : </label>
      <input type="text" id="name" name="name" value=<?php echo $name; ?>>
    </p> 
    
    <p>
      <label for="firstname">First Name : </label>
      <input type="text" id="firstname" name="firstname" value=<?php echo $firstname; ?>>
    </p>

    <p>
      <label for="mail">Mail: </label>
      <input type="email" id="mail" name="mail" placeholder="mail@mail.be" value=<?php echo $mail; ?>>
    </p>

    <p>
      <label for="postalcode">Postal Code : </label>
      <input type="text" id="postalcode" name="postalcode" value=<?php echo $postalcode; ?>>
    </p>

    <p>
      <label for="locomation">Locomotion : </label>
      <input type="text" id="locomotion" name="locomotion" value=<?php echo $locomotion; ?>>
    </p>

    <p>
      <label for="departement">Work Departement : </label>
      <input type="text" id="departement" name="departement" value=<?php echo $departement; ?>>
    </p>

    <p>
      <label for="activity">Selected Activity : </label>
      <input type="text" id="activity" name="activity" value=<?php echo $activity; ?>>
    </p>

    <p>
      <label for="eating">Will you be attending the evening dinner?</label>
      <input type="email" id="eating" name="eating" value=<?php echo $eating; ?>>
    </p>

    <p>
      <label for="password">Password: </label>
      <input type="password" id="password" name="password"/>
    </p>

    <p>
      <label for="password2">Confrim Password: </label>
      <input type="password" id="password2" name="password2"/>
    </p>

    <input type="submit" value="S'inscrire">
  </form>


<h2>Login</h2>
<form action="../controller/login.php" method="post">
    <p>
    <label for="email">Mail : </label>
    <input type="email"  name="email" />
    </p>

    <p>
    <label for="pass">Password : </label>
    <input type="password"  name="pass"/>
    </p>

    <input type="submit" value="Connexion" /><br>
</form>

