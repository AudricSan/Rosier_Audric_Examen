<?php

    /* Include Read and Insert */
    include('../model/read.php');
    include('../model/insert.php');

    /* set error */
    $error = 0;

    /* redefining variables in post */  
    $login = $_POST['login'];
    $password = $_POST['pass'];
        
        /* Unset not use variable */
        unset($_POST['login']);
        unset($_POST['pass']);

    /* Check if admin already exist or not */
    $TAI = TakeAdminInfo($login);
    
    if (!empty($TAI)){
        $error= "Admin already Exist";
        goto end;
    }
    
    /* Admin not Exist Check Password format */
    if (empty($password)){
        $error = 'password required';
        goto end;
    }














    end:
    header("Location: ../view/index.php?error=$error");
    
?>