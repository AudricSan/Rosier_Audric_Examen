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

  /* redefining variables in post */  
    $AdminId = $_SESSION['Admin_ID'];

  /* Check if you're connected or not */
    if($AdminId = 0){
      $error = 'NON CONNECTER EN AMDIN';

      end:
      header("Location: ../view/$path?error=$error");
    }

  /* Load All Data For TABLE */
    $staffid = TakeAllStaffID();
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

  /* ECHO FOR TEST */
    /*
    echo 'APRES COMPRESS';
    var_dump($TASI);
    */
?>



<!DOCTYPE HTML>
<html>

  <head>
    <!--Integration CSS-->
      <link rel="stylesheet" href="Ellements/CSS/style.css">
  </head>

  <body>
    <h1> Admin Page </h1>
    <h2> User List </h2>
    <p>all the staff members who signed up!</p>
    <table border = 1>
      <thead>
          <tr>
              <?php foreach ($TASI[0] as $key => $value) {if($key != 'Staff_ID'){ ?>
              <th> <?php echo $key; } ?></th> <?php } ?>
              <th> Update </th>
              <th> Delete </th>
          </tr>
      </thead>

      <tbody>
        <?php foreach ($TASI as $sta) { ?>
          <tr>
              <?php foreach ($sta as $key2 => $val): if($key2 != 'Staff_ID') { ?>
              <td> <?php echo $val; } ?></td> <?php endforeach; ?>
              <td> <button type="submit"> <a href="uppdateUser?Staff_ID=<?php echo $sta['Staff_ID'];?>">Update User</a></button></td>
              <td> <button type="submit"> <a href="../controller/deleteUser?Staff_ID=<?php echo $sta['Staff_ID'];?>">Delete User</a></button></td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </body>
</html>