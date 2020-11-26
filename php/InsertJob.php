<?php
    // Get SQL Connection object
    include 'Connection.php';
    $conn = $GLOBALS['SQL_CONN'];
	
    $JOB_TITLE = $_POST['jobTitle'];
	$JOB_DESCRIPTION = $_POST['jobDescription'];
    $JOB_NOTE = $_POST['jobNote'];
	$PROPRTY_ID = $_POST['propertyId'];

    $query = "INSERT INTO repair_job (job_title, job_description, job_note, property_id)
              VALUES('$JOB_TITLE','$JOB_DESCRIPTION','$JOB_NOTE',$PROPRTY_ID)";
            
    mysqli_query($conn, $query);
?>