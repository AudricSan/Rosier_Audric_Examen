<?php
    /* TAKE FULL DATA */
    /* Function to Take all data about Activity */
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
    /**/

    /* Function to Take all data about Locomotion */
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
    /**/

    /* Function to Take all data about PostalCode */
        function TakeAllPostalCode(){
            include('connection.php');
            $query = "SELECT * FROM postalcode ORDER BY postalcode_Name";

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
    /**/

    /* Function to Take all data about Staff Member */
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
    /**/

    /* Function to Take all data about WorkDepartment */
        function TakeAllWorkDepartment(){
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
    /**/

    /* Function to Take ALL ID of Staff Member */
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
    /**/

    /* TAKE SPECIAL DATA */
    /* Function to Take All Admin information by LOGIN */
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
    /**/

    /* Function to Take All Staff information by NAME */
        function TakeStaffInfoNAME($name){
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
    /**/

    /* Function to Take All information about a Staff member With Postalcode, Locomotion Mode, Work Department, Activity and Eating info By ID */
        function TakeAllInfoID($id){
            include('connection.php');   
            
            $query = " SELECT Staff_ID, Staff_FirstName, Staff_Name, Staff_Mail, PostalCode_Number, PostalCode_Name, Locomotion_Name, WorkDepartment_Name, Activity_Name, Staff_Eating FROM staff INNER JOIN postalcode ON staff_PCID = postalcode_ID INNER JOIN locomotion ON staff_locomotionID = locomotion_ID INNER JOIN WorkDepartment ON Staff_DepartmentID = WorkDepartment_ID INNER JOIN staffactivity ON staff_id = StaffActivity_StaffID INNER JOIN activity on StaffActivity_ActivityID = activity_id WHERE Staff_ID = :id";       
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
    /**/

    /* Function to Take the Maximum Number about an Activity */
        function TakeActivityMaxID($id){
            include('connection.php');
            $query = "SELECT Activity_MaxNumber FROM activity WHERE activity_ID = :id";
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
    /**/

    /* Function to Take  Staff Member information by ID */
        function TakeStaffInfoID($id){
            include('connection.php');   
            
            $query = "SELECT * FROM Staff where Staff_ID = :id";       
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
    /**/

    /* Function to take the number of participants by activity ID */
        function HowManyPoeples($id){
            include("connection.php");
            $query = "SELECT COUNT(StaffActivity_StaffID) as CountNumber FROM StaffActivity INNER JOIN Activity ON StaffActivity_ActivityID = Activity_Id WHERE Activity_Id = :id GROUP BY StaffActivity_ActivityID";
            
            $query_params = array('id' => $id);
            
            try{
                $stmt = $db->prepare($query);
                $result = $stmt->execute($query_params);
            }
            
            catch(PDOException $ex){
                die("Failed query : " . $ex->getMessage());
            }

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
            if(isset($result[0])) {
                return $result[0];
            }
            
            else {
                return $result;
            }
        }
    /**/

    /* function to take the number of participants Maximum pard activity ID */
        function MaxPoeple($id){
            include("connection.php");
            $query = "SELECT Activity_MaxNumber FROM staffactivity INNER JOIN activity ON StaffActivity_ActivityID = Activity_ID WHERE StaffActivity_ActivityID LIKE :id GROUP BY StaffActivity_ActivityID;";
            
            $query_params = array('id' => $id);
            
            try{
                $stmt = $db->prepare($query);
                $result = $stmt->execute($query_params);
            }
            
            catch(PDOException $ex){
                die("Failed query : " . $ex->getMessage());
            }
            
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if(isset($result[0])) {
                return $result[0];
            }
            
            else {
                return $result;
            }
        }
    /**/
?>