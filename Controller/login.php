<?php
    /* Start Session and Include Read Files */
        session_start();
        include('../Model/read.php');
        include('../Model/function.php');

    /* set error */
        $error = '';
        $path = 'index.php';

    /* redefining variables in post */  
        $login = $_POST['login'];
        $password = $_POST['pass'];
        
        /* Unset not use variable */
            unset($_POST['login']);
            unset($_POST['pass']);


    /* Take Admin Info in DB */
        $TAI = TakeAdminInfo($login);
    
    /* Check If login as Admin or User */
        if (empty($TAI)) {
            /* Take all admin EMPTY we login as USER */
            $location = 'USER';

            echo 'LOGIN AS USER NOT SETUP NOW PLEASE COME BACK LATER';
            goto user;
        }
    
    /* Admin not EMPTY we Login as ADMIN */
        $location = 'ADMIN';
        var_dump($TAI);

            /* redefining variables in DB */
                $TAI = $TAI[0];
                var_dump($TAI);

                $DBID = $TAI['Admin_ID'];  
                $DBlogin = $TAI['Admin_Login'];
                $DBpass = $TAI['Admin_Password'];

            /* Unset not use variable */
                unset($TAI);

        $passok = checkPassword($password, $DBpass);

        if($passok){
            $_SESSION['Admin_ID'] = $DBID;
            $path = 'admin.php';

            goto end;
        }

    /* Go to USER to connect a USER */
        user:
        echo $location;




























    /* Go to END to have only one "header location" */
        end:
        echo $location;

        header("Location: ../view/$path?error=$error");
?>