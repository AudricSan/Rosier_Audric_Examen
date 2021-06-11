<?php
    /* Start Session and Include Read Files */
        session_start();
        include('../Model/delete.php');
        include('../Model/read.php');

    /* set error */
        $error = '';
        $path = 'index.php';

    /* Can you be Here ? */
      /* redefining variables in post */  
      $AdminId = $_SESSION['Admin_ID'];

      /* Check if you're connected or not */
        if($AdminId == 0){
          $error = 'NON CONNECTER EN AMDIN';
    
          end:
          header("Location: $path?error=$error");
        }
    
    /* Redefining Variable in Get */
        $staffid = $_GET['Staff_ID'];
        unset($_GET);

    /* Get User info by ID */
        $staffinfo = TakeStaffInfoID($staffid);

    /* Load All Data For Forms */
        $postalCode = TakeAllPostalCode();
        $locomotion = TakeAllLocomotion();
        $workDepartement = TakeAllWorkDepartment();
        $activity = TakeAllActivity();

    /* Redefine Variable User value for use */
        foreach($staffinfo as $value){
            $info = $value;
        }

        $name = $info['Staff_Name'];
        $firstname = $info['Staff_FirstName'];
        $mail = $info['Staff_Mail'];

?>

<!DOCTYPE HTML>
<html>

  <head>
    <!--Integration CSS-->
      <link rel="stylesheet" href="Ellements/CSS/style.css">

  </head>

  <body>
    <h1>Update User</h1>
      <form action="../controller/update.php" method="post">

        <p class="Name">
          <label for="name">Name : </label>
          <input type="text" id="name" name="name" placeholder="Your Name" value="<?php echo $name ?>" required>
        </p> 
        
        <p class="FirstName">
          <label for="firstname">First Name : </label>
          <input type="text" id="firstname" name="firstname" placeholder="Your First Name" value="<?php echo $firstname ?>" required>
        </p>

        <p class="Mail">
          <label for="mail">Mail: </label>
          <input type="email" id="mail" name="mail" placeholder="mail@mail.be" value="<?php echo $mail ?>" required>
        </p>

        <p class="PostalCode">
          <label for="postalcode">Postal Code : </label>
          <select id="postalcode" name="postalcode">
                <?php foreach($postalCode as $value){?>
                <option value="<?php echo $value['PostalCode_ID']; ?>"> <?php echo $value['PostalCode_Number'];?> (<?php echo $value['PostalCode_Name'];?>) <?php } ?></option>
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
                <?php foreach($activity as $value){?>
                <option value="<?php echo $value['Activity_ID']; ?>"><?php echo $value['Activity_Name'];}?></option>
          </select>
        </p>

        <p class="Eating">
          <label for="eating">Will you be attending the evening dinner?</label>
          <input type="checkbox" id="eating" name="eating">
        </p>

        <input type="submit" value="Update !">
      </form>
  </body>
</html>