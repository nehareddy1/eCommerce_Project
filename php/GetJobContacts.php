<?php
    include 'Connection.php';
    $conn = $GLOBALS['SQL_CONN'];

    $jobId = $_POST['JOBID'];

    $query = "SELECT * FROM contact_job_user WHERE job_id=$jobId";
    $result = mysqli_query($conn, $query);
    
    if(mysqli_num_rows($result) > 0) {

        $contacts = array(); 

        while($row = mysqli_fetch_assoc($result)) {

            $contact = array();   
            $contact["NAME"] = $row["Name"];
            $contact["ADDRESS"] = $row["Address"];
            $contact["PHONE"] = $row["phone"];
            array_push($contacts, $contact);
        }
        echo json_encode($contacts);
    }
    else 
    {
        echo "Error: " . $conn . "<br>" . mysqli_error($conn);
    } 
    
?>