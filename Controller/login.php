<?php

    session_start();
    include('../Model/read.php');
    
    $_POST['login'] = 'Audric';

    $TAI = TakeAdminInfo($_POST['login']);

    var_dump($TAI);













?>