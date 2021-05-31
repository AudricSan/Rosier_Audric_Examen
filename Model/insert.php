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

    function insertStaff ($name, $fisrtname, $mail, $pcid, $locomotion, $department, $eating){
        include("connection.php");
        
        $query = "INSERT INTO Staff (Staff_Name, Staff_FirstName, Staff_Mail, Staff_PCID, Staff_LocomotionID, Staff_DepartmentID, Staff_Eating) VALUES (:names, :fisrt, :mail, :pcid, :loco, :depa, :eat)";
        $query_params = array(":names" => $name, ":fisrt" => $fisrtname, ":mail" => $mail, ":pcid" => $pcid, ":loco" => $locomotion, ":depa" => $department, ":eat" => $eating);
        
        try{
            $stmt = $db -> prepare($query);
            $result = $stmt -> execute($query_params);
        }
        
        catch(PDOException $ex){
            die("Failed query : " . $ex -> getMessage());
        }
    }

    function insertStaffActivity ($staffid, $activityid){
        include("connection.php");
        
        $query = "INSERT INTO StaffActivity (StaffActivity_StaffID, StaffActivity_ActivityID) VALUES (:staffid, :activityid)";
        $query_params = array(":staffid" => $staffid, ":activityid" => $activityid);
        
        try{
            $stmt = $db -> prepare($query);
            $result = $stmt -> execute($query_params);
        }
        
        catch(PDOException $ex){
            die("Failed query : " . $ex -> getMessage());
        }
    }
?>