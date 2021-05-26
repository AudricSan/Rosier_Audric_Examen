<?php

    function TakeAllActivity(){
        include('connection.php');
        $query = "SELECT * FROM activity ORDER BY activity_ID";

        try{
            $stmt = $db->prepare($query);
            $result = $stmt->execute();
        }

        catch(PDOException $ex){
            die("Failed query : " . $ex->getMessage());
        }

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $result;
    }

    function TakeAllLocomotion(){
        include('connection.php');
        $query = "SELECT * FROM locomotion ORDER BY locomotion_ID";

        try{
            $stmt = $db->prepare($query);
            $result = $stmt->execute();
        }

        catch(PDOException $ex){
            die("Failed query : " . $ex->getMessage());
        }

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $result;
    }

    function TakeAllPostalCode(){
        include('connection.php');
        $query = "SELECT * FROM postalcode ORDER BY postalcode_ID";

        try{
            $stmt = $db->prepare($query);
            $result = $stmt->execute();
        }

        catch(PDOException $ex){
            die("Failed query : " . $ex->getMessage());
        }

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $result;
    }

    function TakeAllStaff(){
        include('connection.php');
        $query = "SELECT * FROM staff ORDER BY staff_ID";

        try{
            $stmt = $db->prepare($query);
            $result = $stmt->execute();
        }

        catch(PDOException $ex){
            die("Failed query : " . $ex->getMessage());
        }

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $result;
    }

    function TakeAllWorkDepartement(){
        include('connection.php');
        $query = "SELECT * FROM workdepartment ORDER BY WorkDepartment_ID";

        try{
            $stmt = $db->prepare($query);
            $result = $stmt->execute();
        }

        catch(PDOException $ex){
            die("Failed query : " . $ex->getMessage());
        }

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $result;
    }

    function TakeAdminInfo($login){
        include('../model/connection.php');   
        
        $query = "SELECT * FROM admin where Admin_Login = :login";       
        $query_params = array(':login' => $login);            
        
        try{
            $stmt = $db->prepare($query);        
            $result = $stmt->execute($query_params);  
        }
        
        catch(PDOException $ex){
            die("Failed query : " . $ex->getMessage());
        }
        
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);   
        
        return $result;
    }

    function TakeStaffInfo($name){
        include('../model/connection.php');   
        
        $query = "SELECT * FROM Staff where Staff_Name = :name";       
        $query_params = array(':name' => $name);            
        
        try{
            $stmt = $db->prepare($query);        
            $result = $stmt->execute($query_params);  
        }
        
        catch(PDOException $ex){
            die("Failed query : " . $ex->getMessage());
        }
        
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);   
        
        return $result;
    }
?>