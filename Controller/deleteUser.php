<?php
    /* Start Session and Include Read Files */
        session_start();
        include('../Model/delete.php');

    /* set error */
    $error = '';
    $path = 'index.php';

    /* Can you be Here ? */
      /* redefining variables in post */  
      $AdminId = $_SESSION['Admin_ID'];

      /* Check if you're connected or not */
        if($AdminId = 0){
          $error = 'NON CONNECTER EN AMDIN';
    
          end:
          header("Location: ../view/$path?error=$error");
        }
    
    /* Redefining Variable in Get */
        $staffid = $_GET['Staff_ID'];
        unset($_GET);

    /* Delete User By ID in GET */
        deleteUserID($staffid);

    /* Delete Activity by ID in Get */
        deleteStaffActivityID($staffid);

    /* Go back in Admin Page */
        /* Set new Error */
            $error = 'Deleted User';
            $path = 'admin.php';
        
        goto end;
?>