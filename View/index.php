<?php
  session_start();
  if(isset($_GET["error"])){
      echo $_GET["error"] . " !";
  }

  isset($_SESSION["notok"]["name"]) ? $name = $_SESSION["notok"]["name"] : $name='';
  isset($_SESSION["notok"]["email"]) ? $email = $_SESSION["notok"]["email"] : $email='';
  isset($_SESSION["notok"]["naiss"]) ? $naissance = $_SESSION["notok"]["naiss"] : $naissance='';
  isset($_SESSION["notok"]["pseudo"]) ? $pseudo = $_SESSION["notok"]["pseudo"] : $pseudo='';
?>


<h1>The staff day!</h1>
<h2>Registration </h2>
  <form action="../controller/signup.php" method="post">
    <p>
      <label for="name">Name : </label>
      <input type="text" id="name" name="name" placeholder="Your Name">
    </p> 
    
    <p>
      <label for="firstname">First Name : </label>
      <input type="text" id="firstname" name="firstname" placeholder="Your First Name">
    </p>

    <p>
      <label for="mail">Mail: </label>
      <input type="email" id="mail" name="mail" placeholder="mail@mail.be">
    </p>

    <p>
      <label for="postalcode">Postal Code : </label>
      <select id="postalcode" name="postalcode">
        <option value="0">Bruxelles</option>
        <option value="1">Namur</option>
        <option value="2">Beauvechain</option>
      </select>
      
    </p>

    <p>
      <label for="locomation">Locomotion : </label>
      <select id="locomotion" name="locomotion">
        <option value="0">Cars</option>
        <option value="1">Public Transportation</option>
        <option value="2">Foot</option>
      </select>

    </p>

    <p>
      <label for="departement">Work Departement : </label>
      <select id="departement" name="departement">
        <option value="0">Urbanism</option>
        <option value="1">Coach</option>
        <option value="2">Storage Occupation</option>
      </select>

    </p>

    <p>
      <label for="activity">Selected Activity : </label>
      <select id="activity" name="activity">
        <option value="0">Kitchen Workshop</option>
        <option value="1">Forest Workshop</option>
      </select>

    </p>

    <p>
      <label for="eating">Will you be attending the evening dinner?</label>
      <input type="checkbox" id="eating" name="eating">
    </p>

    <input type="submit" value="S'inscrire">
  </form>


<h2>Login</h2>
<form action="../controller/login.php" method="post">
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

