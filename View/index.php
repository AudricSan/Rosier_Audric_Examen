<?php
  /* SESSION AND ERROR */
    session_start();
    
    if(isset($_GET["error"])){
        echo "<p style=\"color: red; font-size: 20px;\">" . $_GET["error"] . "</p>";
    }

  /* INCLUDE */
    include('../Model/read.php');

  /* Load All Data For Forms */
    $postalCode = TakeAllPostalCode();
    $locomotion = TakeAllLocomotion();
    $workDepartement = TakeAllWorkDepartment();
    $activity = TakeAllActivity();

  /* VAR DUMP FOR CHECK IF ALL QUERY TO DATABASE IS CORRECT */
  /* ALL IS ARRAY */
    /*
      var_dump($postalCode[0]);
      var_dump($locomotion[0]);
      var_dump($workDepartement[0]);
      var_dump($activity[0]);
    */
?>

<!DOCTYPE HTML>
<html>

  <head>
    <!--Integration CSS-->
      <link rel="stylesheet" href="Ellements/CSS/style.css">

  </head>

  <body>
    <h1>The staff day!</h1>
    <h2>Registration </h2>
      <form action="../controller/useractivity.php" method="post">

        <p class="Name">
          <label for="name">Name : </label>
          <input type="text" id="name" name="name" placeholder="Your Name" required>
        </p> 
        
        <p class="FirstName">
          <label for="firstname">First Name : </label>
          <input type="text" id="firstname" name="firstname" placeholder="Your First Name" required>
        </p>

        <p class="Mail">
          <label for="mail">Mail: </label>
          <input type="email" id="mail" name="mail" placeholder="mail@mail.be" required>
        </p>

        <p class="PostalCode">
          <label for="postalcode">Postal Code : </label>
          <select id="postalcode" name="postalcode">
              <?php foreach($postalCode as $value){?>
                  <option value="<?php echo $value['PostalCode_ID']; ?>"><?php echo $value['PostalCode_Name'];?> (<?php echo $value['PostalCode_Number'];?>) <?php } ?></option>
          </select>
        </p>

        <p class="Locomotion">
          <label for="locomotion">locomotion : </label>
          <select id="locomotion" name="locomotion">
              <?php foreach($locomotion as $value){?>
                  <option value="<?php echo $value['Locomotion_ID']; ?>"><?php echo $value['Locomotion_Name'];}?></option>
          </select>
        </p>

        <p class="Department">
          <label for="department">Work department : </label>
          <select id="department" name="department">
              <?php foreach($workDepartement as $value){?>
                  <option value="<?php echo $value['WorkDepartment_ID']; ?>"><?php echo $value['WorkDepartment_Name'];}?></option>
          </select>
        </p>

        <p class="Activity">
          <label for="activity">Selected Activity : </label>
          <select id="activity" name="activity">
            <?php foreach ($activity as $acti){
                  
              $MaxNumber = MaxPoeple($acti['Activity_ID']);
              $CountNumber = HowManyPoeples($acti['Activity_ID']);

              /* vardump for check value
                var_dump($CountNumber);
                var_dump($MaxNumber);
              */
              
              if ($CountNumber['CountNumber']<$MaxNumber['Activity_MaxNumber']){ ?>
                <option value="<?php $acti['Activity_ID']; ?> "> <?php echo $acti['Activity_Name']; }?> </option>

              <?php
              if (!isset($CountNumber['CountNumber'])){ ?>
                <option value="<?php $acti['Activity_ID']; ?> "> <?php echo $acti['Activity_Name']; }?></option>
            <?php } ?>
            
          </select>  
        </p>

        <p class="Eating">
            <label for="eating">Will you be attending the evening dinner?</label>
            <input type="checkbox" id="eating" name="eating">
        </p>

        <input type="submit" value="S'inscrire">
      </form>

    <h2>Login</h2>
    <form action="../controller/login.php" method="post">
        <p>
        <label for="login">Login : </label>
        <input type="text"  name="login" required/>
        </p>

        <p>
        <label for="pass">Password : </label>
        <input type="password"  name="pass" required/>
        </p>

        <input type="submit" value="Connexion" /><br>
    </form>
  </body>
</html>