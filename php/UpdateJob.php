<?php
    include 'Connection.php';
    $conn = $GLOBALS['SQL_CONN'];  

    $JOB_ID = $_POST['jobId'];
    $JOB_TITLE = $_POST['jobTitle'];
	$JOB_DESCRIPTION = $_POST['jobDescription'];
    $JOB_NOTE = $_POST['jobNote'];
	$PROPRTY_ID = $_POST['propertyTitle'];
    
    $query = "UPDATE repair_job SET 
                job_title = '$JOB_TITLE',
                job_description = '$JOB_DESCRIPTION',
                job_note = '$JOB_NOTE',
                property_id = $PROPRTY_ID
                WHERE job_id = $JOB_ID";

    if (mysqli_query($conn, $query))
    {
        echo "Job updated";
    }
    else 
    {
        echo "Error: " . $conn . "<br>" . mysqli_error($conn);
    }
?>