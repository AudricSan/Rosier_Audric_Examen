<?php
/* TEST PHP REQUEST BEFORE INCLUDE IN HTML*/

    /* INCLUDE */
        include('../../..//Model/read.php');

    /* Load All Data For Forms */
        $postalCode = TakeAllPostalCode();
        $locomotion = TakeAllLocomotion();
        $workDepartement = TakeAllWorkDepartement();
        $activity = TakeAllActivity();

    /* VAR DUMP FOR CHECK IF ALL QUERY TO DATABASE IS CORRECT */
    /* ALL IS ARRAY */
        var_dump($postalCode[0]);
        var_dump($locomotion[0]);
        var_dump($workDepartement[0]);
        var_dump($activity[0]);

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






?>