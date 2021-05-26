<?php

    /* Include Read and Insert */
        include('../model/read.php');
        include('../model/insert.php');
        include('../model/function.php');

    /* set error */
        $error = '';
        $path = 'index.php';

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

        $error = checkPassFormat($password);
        if (!empty($error)){
            goto end;
        }

    /* Hash Password */
        $hashPass = password_hash($password, PASSWORD_BCRYPT);

        /* Unset old Password Variable */
            unset($password);
            var_dump($hashPass);
         
    /* Add Admin in DB */
        insertAdmin($login, $hashPass);

        /* Set forwarding */
            $error = 'Administrateur Inscrit';
            $path = 'index.php';

    /* Go to END to have only one "header location" */
        end:
        header("Location: ../view/$path?error=$error");
?>