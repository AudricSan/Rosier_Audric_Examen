<?php

    function deleteUserID ($ID){
        include("connection.php");

        $query = "DELETE FROM staff WHERE Staff_ID = :id";
        $query_params = array(":id" => $id);

        try{
            $stmt = $db -> prepare($query);
            $result = $stmt -> execute($query_params);
        }
        
        catch(PDOException $ex){
            die("Failed query : " . $ex -> getMessage());
        }
    }

    function deleteStaffActivityID ($ID){
        include("connection.php");

        $query = "DELETE FROM staffactivity WHERE StaffActivity_StaffID = :id";
        $query_params = array(":id" => $id);

        try{
            $stmt = $db -> prepare($query);
            $result = $stmt -> execute($query_params);
        }
        
        catch(PDOException $ex){
            die("Failed query : " . $ex -> getMessage());
        }
    }
?>