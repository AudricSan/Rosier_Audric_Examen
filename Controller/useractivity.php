<?php
    /* Start Session and Include Read Files */
        session_start();
        include('../Model/read.php');
        include('../Model/function.php');
        include('../Model/insert.php');

        unset($_SESSION['Admin_ID']);

    /* set error */
        $error = '';
        $path = 'index.php';

    /* something wrong ? */
        if(!isset($_POST)){
            $error = 'Not filled the form';
            goto end;
        }

    /* redefining variables in post */
        $name = $_POST['name'];
        $firstname = $_POST['firstname'];
        $mail = $_POST['mail'];
        $postalcode = $_POST['postalcode'];
        $locomotion = $_POST['locomotion'];
        $department = $_POST['department'];
        $activity = $_POST['activity'];
        $eating = $_POST['eating'];

        /* Change Eating Value */
            if ($eating == NULL){
                $eating = 'No';
            }

            if ($eating == 'on'){
                $eating = 'Yes';
            }

        /* Unset not use variable */
            unset($_POST['name']);
            unset($_POST['firstname']);
            unset($_POST['mail']);
            unset($_POST['postalcode']);
            unset($_POST['locomotion']);
            unset($_POST['department']);
            unset($_POST['activity']);
            unset($_POST['eating']);

            unset($_POST);

    /* Change STRING to INT */
        $postalcode = intval($postalcode);
        $locomotion = intval($locomotion);
        $department = intval($department);
        $activity = intval($activity);

    /* var_dump ALL POST */
    
        var_dump($name);
        var_dump($firstname);
        var_dump($mail);
        var_dump($postalcode);
        var_dump($locomotion);
        var_dump($department);
        var_dump($activity);
        var_dump($eating);
    
    
    /* Check if User Exist */
        $TSI = TakeStaffInfoNAME($name);

        if (!empty($TSI)){
            $error= "User already Exist";
            goto end;
        }
        
    /* insert User un DB */
        insertStaff($name, $firstname, $mail, $postalcode, $locomotion, $department, $eating);

        /* Unset not use variable */
            unset($firstname);
            unset($mail);
            unset($postalcode);
            unset($locomotion);
            unset($department);
            unset($eating);

    /* Take The ID of User Just Add in DB */
        $staffid = TakeStaffInfoNAME($name);
        /*var_dump($staffid);*/

        $staffid = $staffid[0];
        /*var_dump($staffid);*/

        $staffid = $staffid['Staff_ID'];
        /*var_dump($staffid);*/

    /* Add Activity Info in DB */
        insertStaffActivity($staffid, $activity);

        /* Definite $PATH and error*/
            $path = 'index.php';
            $error = 'STAFF INSCRIT';
            $_SESSION['User_Name'] = $name;

        /* Unset not use variable */
            unset($name);
            unset($activity);
            unset($staffid);
    
    /* Go to END to have only one "header location" */
        end:
        header("Location: ../view/$path?error=$error");
?>