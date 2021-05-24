<?php
    /*Qtart Session and Include Read Files*/
    session_start();
    include('../Model/read.php');

    /* Take Admin Info in DB */
    $TAI = TakeAdminInfo($_POST['login']);
    
    /* Check If login as Admin or User */
    if (empty($TAI)) {
        /* TAKE ALL ADMIN FALSE WE LOG IN AS USERS! */
        
    }

    /* ADMIN NOT EMPTY We LONG IN AS ADMIN */





























































?>