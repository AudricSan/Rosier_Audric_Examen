<?php

  /* SESSION AND ERROR */
    session_start();
    
    if(isset($_GET["error"])){
        echo $_GET["error"] . " !";
    }

  /* INCLUDE */
    include('../Model/read.php');

  /* Load All Data For Forms */
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


<h1>The staff day!</h1>
<h2>Registration </h2>
  <form action="../controller/signup.php" method="post">
    <p>
      <label for="name">Name : </label>
      <input type="text" id="name" name="name" placeholder="Your Name" require>
    </p> 
    
    <p>
      <label for="firstname">First Name : </label>
      <input type="text" id="firstname" name="firstname" placeholder="Your First Name" require>
    </p>

    <p>
      <label for="mail">Mail: </label>
      <input type="email" id="mail" name="mail" placeholder="mail@mail.be" require>
    </p>

    <p>
      <label for="postalcode">Postal Code : </label>
      <select id="postalcode" name="postalcode">
          <?php foreach($postalCode as $value){?>
              <option value="<?php echo $value['PostalCode_ID']; ?>"><?php echo $value['PostalCode_Name'];}?></option>
      </select>
    </p>

    <p>
      <label for="locomotion">locomotion : </label>
      <select id="locomotion" name="locomotion">
          <?php foreach($locomotion as $value){?>
              <option value="<?php echo $value['Locomotion_ID']; ?>"><?php echo $value['Locomotion_Name'];}?></option>
      </select>
    </p>

    <p>
      <label for="departement">Work Departement : </label>
      <select id="departement" name="departement">
          <?php foreach($workDepartement as $value){?>
              <option value="<?php echo $value['WorkDepartment_ID']; ?>"><?php echo $value['WorkDepartment_Name'];}?></option>
      </select>
    </p>

    <p>
      <label for="activity">Selected Activity : </label>
      <select id="activity" name="activity">
          <?php foreach($activity as $value){?>
          <option value="<?php echo $value['Activity_ID']; ?>"><?php echo $value['Activity_Name'];}?></option>
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