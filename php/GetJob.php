<?php
    include 'Connection.php';
    $conn = $GLOBALS['SQL_CONN'];       

    $JOB_ID = $_POST['JOB_ID'];

    $query = "SELECT * FROM repair_job WHERE job_id = $JOB_ID";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) == 1) {
 
        $row = mysqli_fetch_assoc($result); 

        $job = array();   
        $job["ID"] = $row["job_id"];
        $job["TITLE"] = $row["job_title"];
        $job["DESCRIPTION"] = $row["job_description"];
        $job["PROPERTYID"] = $row["property_id"];
        $job["NOTE"] = $row["job_note"];

        echo json_encode($job);
    }
    else {
        echo 'error';
    }    
?>