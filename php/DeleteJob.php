<?php
    // Get SQL Connection object
    include 'Connection.php';
    $conn = $GLOBALS['SQL_CONN'];

    $JOB_ID = json_decode($_GET['ID']);    

    $query = "DELETE FROM repair_job WHERE job_id = $JOB_ID";
    mysqli_query($conn, $query);
    //header("Location: ../html/JobsAdmin.php");
?>