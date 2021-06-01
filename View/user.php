<?php
  /* Start Session and Include Read Files */
    session_start();
    include('../Model/read.php');
    include('../Model/function.php');

    /* View Error If isset */
      if(isset($_GET["error"])){
        echo "<p style=\"color: red; font-size: 20px;\">" . $_GET["error"] . "</p>";
      }

  /* set error */
    $error = '';
    $path = 'index.php';


  /* Load All Data For TABLE */
    $staffid = TakeStaffInfoNAME($_SESSION['User_Name']);
    $staff = TakeAllStaff();
    

    foreach ($staffid as $key => $value){
      $valueInt = intval($value['Staff_ID']);
      $TAII[] = TakeAllInfoID($valueInt);
    }

    foreach ($TAII as $tai ){
      foreach ($tai as $ta){
        /*TAKE ALL STAFF INFO - RENAMING VARIABLE*/
        $TASI[] = $ta;
      }
    }

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
    
    <table border = 1>
      <thead>
          <tr>
              <?php foreach ($TASI[0] as $key => $value) {if($key != 'Staff_ID'){ ?>
              <th> <?php echo $key; } ?></th> <?php } ?>
          </tr>
      </thead>

      <tbody>
        <?php foreach ($TASI as $sta) { ?>
          <tr>
              <?php foreach ($sta as $key2 => $val): if($key2 != 'Staff_ID') { ?>
              <td> <?php echo $val; } ?></td> <?php endforeach; ?>
          </tr>
        <?php } ?>
      </tbody>
    </table>

    <button><a href="index.php"> GO BACK INDEX </a></button>
  </body>
</html>