<?php


    /* COPPY NEED TO REVIEW */
        include('../model/read.php');
        include('../model/insert.php');

        /*var_dump($_POST);*/
        $UtiNom = $_POST['nom'];
        $UtiDateNaiss = $_POST['dateNais'];

        unset($_POST['nom']);
        unset($_POST['dateNais']);

        if(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
        $mail = $_POST['email'];
        unset($_POST['email']);
        $exist=mailExistAdmin($mail);
        if(empty($exist)){
            echo 'mail non connu en DB, on valide !!!' ;
        }else{
            $error = 'mail déjà en DB, on ne valide pas !!!';
        }
        }else{
        $error = 'mail pas bon !';
        }
        $utiLogin = $_POST['login'];
        unset($_POST['login']);
        $utilexist=utilExistAdmin($utiLogin);
        if(empty($utilexist)){
        echo 'login non connu en DB, on valide';
        }else{
        $error = 'login non correct';
        }

        if($_POST['motDePasse'] == $_POST['motDePasse2']){
        unset($_POST['motDePasse2']);
        if((strlen($_POST['motDePasse'])>=8) && (preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W)#', $_POST['motDePasse']))){
            $mdp = password_hash($_POST['motDePasse'],PASSWORD_BCRYPT);
        }else{
            $error = 'Le mot de passe doit contenir au moins 8 caractères dont 1 majuscule, 1 minuscule, 1 chiffre et un carctère spécial';
        }
        }else{
        $error = 'Mot de passe différent !';
        }

        if(isset($error)){
        echo $error;
        }else{
        insertAdmin($mail,$mdp,$utiLogin,$UtiDateNaiss,$UtiNom);
        header("Location: ../view/forum.php");
        }
?>