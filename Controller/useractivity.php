<?php
    /* Start Session and Include Read Files */
        session_start();
        include('../Model/read.php');
        include('../Model/function.php');
        include('../Model/insert.php');

    /* set error */
        $error = '';
        $path = 'index.php';

    /* redefining variables in post */  
        $name = $_POST['name'];
        $firstname = $_POST['firstname'];
        $mail = $_POST['mail'];
        $postalcode = $_POST['postalcode'];
        $locomotion = $_POST['locomotion'];
        $department = $_POST['department'];
        $activity = $_POST['activity'];
        $eating = $_POST['eating'];
        
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

    /* Change EATING variable to INT */
        if($eating = 'on'){
            $eating = 1;
        }

        else{
            $eating = 0;
        }

    /* var_dump ALL POST */
        var_dump($name);
        var_dump($firstname);
        var_dump($mail);
        var_dump($postalcode);
        var_dump($locomotion);
        var_dump($department);
        var_dump($activity);
        var_dump($eating);
    
    /* insert User un DB */
        insertStaff($name, $firstname, $mail, $postalcode, $locomotion, $department, $activity, $eating);
        
?>