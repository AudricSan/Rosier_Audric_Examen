<?php
    /* FULL DATA */

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

    function TakeAllStaffID(){
        include('connection.php');
        $query = "SELECT Staff_ID FROM staff ORDER BY staff_ID";

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


    /* SPECIAL DATA */

    function TakeAdminInfo($login){
        include('connection.php');   
        
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
        include('connection.php');   
        
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

    function TakeAllInfoID($id){
        include('connection.php');   
        
        $query = " SELECT Staff_ID, Staff_FirstName, Staff_Name, Staff_Mail , PostalCode_Number, PostalCode_Name, Locomotion_Name, WorkDepartment_Name, Activity_Name FROM staff LEFT OUTER JOIN postalcode ON staff_PCID = postalcode_ID LEFT OUTER JOIN locomotion ON staff_locomotionID = locomotion_ID LEFT OUTER JOIN WorkDepartment ON Staff_DepartmentID = WorkDepartment_ID LEFT OUTER JOIN staffactivity ON staff_id = StaffActivity_StaffID LEFT OUTER JOIN activity on StaffActivity_ActivityID = activity_id WHERE Staff_ID = :id";       
        $query_params = array(':id' => $id);            
        
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