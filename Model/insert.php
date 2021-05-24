<?php

    function insertAdmin ($login, $pass){
        include("connection.php");
        
        $query = "INSERT INTO Admin (Admin_Login, Admin_Password) VALUES (:login, :pass)";
        $query_params = array(":login" => $login, ":pass" => $pass);
        
        try{
            $stmt = $db -> prepare($query);
            $result = $stmt -> execute($query_params);
        }
        
        catch(PDOException $ex){
            die("Failed query : " . $ex -> getMessage());
        }
    }


?>