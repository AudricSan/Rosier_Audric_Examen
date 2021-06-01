<?php
    include('../../../Model/read.php');

    $activity = TakeActivityMaxID($activityid);
    var_dump($activity);

    $activity = $activity[0];
    var_dump($activity['Activity_MaxNumber']);


?>