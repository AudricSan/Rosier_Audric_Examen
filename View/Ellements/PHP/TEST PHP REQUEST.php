<?php
/* TEST PHP REQUEST BEFORE INCLUDE IN HTML*/

    /* INCLUDE */
        /*include('../../..//Model/read.php');*/

    /* Load All Data For Forms */
        /*
        $postalCode = TakeAllPostalCode();
        $locomotion = TakeAllLocomotion();
        $workDepartement = TakeAllWorkDepartement();
        $activity = TakeAllActivity();
        */

    /* VAR DUMP FOR CHECK IF ALL QUERY TO DATABASE IS CORRECT */
    /* ALL IS ARRAY */
        /*
        var_dump($postalCode[0]);
        var_dump($locomotion[0]);
        var_dump($workDepartement[0]);
        var_dump($activity[0]);
        */

    /* TEST CODE HERE */
        
        /*FOREACH FOR POSTAL CODE*/
            /*GOOD FOREACH*/
                /*
                    foreach($postalCode as $value){
                        echo $value['PostalCode_ID'] . ': ID' . '<br/>';
                        echo $value['PostalCode_Number'] . ': PC' . '<br/>';
                        echo $value['PostalCode_Name'] . ': NAME' . '<br/>';
                    }
                */
            
            /*GOOD FOREACH INCLUDE IN HTML*/
                /*
                    <label for="postalcode">Postal Code : </label>
                    <select id="postalcode" name="postalcode">
                        <?php foreach($postalCode as $value){?>
                            <option value="<?php echo $value['PostalCode_ID']; ?>"><?php echo $value['PostalCode_Name'];}?></option>
                    </select>
                */
        /**/

        /*FOREACH FOR LOCOMOTION*/
            /*GOOD FOREACH*/
                /*
                    foreach($locomotion as $value){
                        echo $value['Locomotion_ID'] . ': ID' . '<br/>';
                        echo $value['Locomotion_Name'] . ': NAME' . '<br/>';
                    }
                */
            
            /*GOOD FOREACH INCLUDE IN HTML*/
                /*
                    <label for="locomotion">locomotion : </label>
                    <select id="locomotion" name="locomotion">
                        <?php foreach($locomotion as $value){?>
                            <option value="<?php echo $value['Locomotion_ID']; ?>"><?php echo $value['Locomotion_Name'];}?></option>
                    </select>
                */
        /**/

        /*FOREACH FOR WORKDEPARTEMENT*/
            /*GOOD FOREACH*/
                /*
                    foreach($workDepartement as $value){
                        echo $value['WorkDepartment_ID'] . ': ID' . '<br/>';
                        echo $value['WorkDepartment_Name'] . ': NAME' . '<br/>';
                    }
                */
            
            /*GOOD FOREACH INCLUDE IN HTML*/
                /*
                    <label for="departement">Work Departement : </label>
                    <select id="departement" name="departement">
                        <?php foreach($workDepartement as $value){?>
                            <option value="<?php echo $value['WorkDepartment_ID']; ?>"><?php echo $value['WorkDepartment_Name'];}?></option>
                    </select>
                */
        /**/

        /*FOREACH FOR WORKDEPARTEMENT*/
            /*GOOD FOREACH*/
                /*
                    foreach($activity as $value){
                        echo $value['Activity_ID'] . ': ID' . '<br/>';
                        echo $value['Activity_Name'] . ': NAME' . '<br/>';
                        echo $value['Activity_MaxNumber'] . ': Max Number' . '<br/>';
                    }
                */
            
            /*GOOD FOREACH INCLUDE IN HTML*/
                /*
                    <label for="activity">Selected Activity : </label>
                    <select id="activity" name="activity">
                        <?php foreach($activity as $value){?>
                        <option value="<?php echo $value['Activity_ID']; ?>"><?php echo $value['Activity_Name'];}?></option>
                    </select>
                */
        /**/

        /* FOREACH FOR ADMIN TABLE GENERATOR */
            /* FUNCTION */
                function TakeAllStaff(){
                    include('../../../Model/connection.php');
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

            
                function TakeAllStaffID(){
                    include('../../../Model/connection.php');
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

                function TakeAllInfoID($id){
                    include('../../../model/connection.php');   
                    
                    $query = "SELECT * FROM staff LEFT OUTER JOIN postalcode ON staff_PCID = postalcode_ID LEFT OUTER JOIN locomotion ON staff_locomotionID = locomotion_ID LEFT OUTER JOIN WorkDepartment ON Staff_DepartmentID = WorkDepartment_ID LEFT OUTER JOIN staffactivity ON staff_id = StaffActivity_StaffID LEFT OUTER JOIN activity on StaffActivity_ActivityID = activity_id WHERE Staff_ID = :id";       
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
            $staffid = TakeAllStaffID();
            $staff = TakeAllStaff();
        
            /*
                foreach ($staffid as $key => $value){
                    $valueInt = intval($value['Staff_ID']);
                    $TAII = TakeAllInfoID($valueInt);
                    var_dump($TAII);
    
                    foreach ($TAII[0] as $key => $value) {
                        if($key != 'Staff_ID'){
                            echo $key;
                        }
                    } 
                    
                    foreach ($TAII as $tai) {
                        foreach ($tai as $key2 => $val){
                            if($key2 != 'Staff_ID'){
                                echo $val;}
                        }
                    }
                }
            */
   
            /* NOT PERFECT BUT OKAY */
                foreach ($staffid as $key => $value){
                    $valueInt = intval($value['Staff_ID']);
                    $TAII = TakeAllInfoID($valueInt);
                    /*var_dump($TAII);*/ ?>
                        
                        <table border = 1>
                            <thead>
                                <tr>
                                    <?php foreach ($TAII[0] as $key => $value) {
                                    if($key != 'Staff_ID'){ ?>
                                    <th><?php echo $key;}?></th>
                                    <?php } ?>
                                    <th> Update </th>
                                    <th> Delete </th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach ($TAII as $tai) {?>
                                    <tr>
                                        <?php foreach ($tai as $key2 => $val){
                                        if($key2 != 'Staff_ID'){ ?>
                                        <td><?php echo $val;}?></td>
                                        <?php } ?>
                                        <td> <button type="submit"> <a href="updateUti?pk=<?php echo $tai['Staff_ID']; ?>">ChangeMwa!</a></button></td>
                                        <td> <button type="submit"> <a href="../controller/deleteUti?pk=<?php echo $tai['Staff_ID']; ?>">Foutoncamp!</a></button></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <br>
                <?php       }
                            /**/
                ?>