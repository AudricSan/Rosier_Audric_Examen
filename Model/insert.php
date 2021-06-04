<?php
    /* Function to Insert a New Admin */
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
    /**/

    /* Function to Insert a new Staff Member */
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
    /**/

    /* Function to Insert a new Staff Activity */
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
    /**/

    /* Function to change information of a Staff Member */
        function alterStaff ($name, $fisrtname, $mail, $pcid, $locomotion, $department, $eating, $id){
            include("connection.php");
            
            $query = "UPDATE staff SET Staff_Name = :name, Staff_FirstName = :first, Staff_Mail = :mail, Staff_PCID = :pcid, Staff_LocomotionID = :loco, Staff_DepartmentID = :depa, Staff_Eating = :eat where Staff_ID = :id";
            $query_params = array(":name" => $name, ":first" => $fisrtname, ":mail" => $mail, ":pcid" => $pcid, ":loco" => $locomotion, ":depa" => $department, ":eat" => $eating, ':id' => $id);
            
            try{
                $stmt = $db -> prepare($query);
                $result = $stmt -> execute($query_params);
            }
            
            catch(PDOException $ex){
                die("Failed query : " . $ex -> getMessage());
            }
        }
    /**/

    /* Function to Change information about a Staff Member Activity */
        function alterStaffActivity ($staffid, $activityid){
            include("connection.php");
            
            $query = "UPDATE StaffActivity SET StaffActivity_ActivityID = :activityid WHERE StaffActivity_StaffID = :staffid ";
            $query_params = array(":staffid" => $staffid, ":activityid" => $activityid);
            
            try{
                $stmt = $db -> prepare($query);
                $result = $stmt -> execute($query_params);
            }
            
            catch(PDOException $ex){
                die("Failed query : " . $ex -> getMessage());
            }
        }
    /**/
?>