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

      end:
      header("Location: ../view/$path?error=$error");
    }

  /* Load All Data For TABLE */
    $staff = TakeAllStaff();

?>

<!DOCTYPE HTML>
<html>

  <head>
    <!--Integration CSS-->
      <link rel="stylesheet" href="Ellements/CSS/style.css">
  </head>

  <body>
    <table border = 1>
      <thead>
          <tr>
              <?php foreach ($staff[0] as $key => $value) {
                if($key != 'Staff_ID'){ ?>
              <th><?php echo $key ;}?></th>
              <?php } ?>
              <th> Update </th>
              <th> Delete </th>
          </tr>
      </thead>

      <tbody>
        <?php foreach ($staff as $sta) {?>
          <tr>
              <?php foreach ($sta as $key2 => $val):
                if($key2 != 'Staff_ID'){ ?>
                <td><?php echo $val;}?></td>
              <?php endforeach; ?>
              <td> <button type="submit"> <a href="updateUti?pk=<?php echo $sta['Staff_ID'];?>">ChangeMwa!</a></button></td>
              <td> <button type="submit"> <a href="../controller/deleteUti?pk=<?php echo $sta['Staff_ID'];?>">Foutoncamp!</a></button></td>
          </tr>
        <?php }?>
      </tbody>
    </table>
  </body>
</html>