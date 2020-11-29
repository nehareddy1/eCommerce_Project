<?php
    include 'Connection.php';
    $conn = $GLOBALS['SQL_CONN'];

    $query = "SELECT * FROM repair_job";
    $result = mysqli_query($conn, $query);
    
    if(mysqli_num_rows($result) > 0) {

        $jobs = array(); 

        while($row = mysqli_fetch_assoc($result)) {

            $job = array();   
            $job["ID"] = $row["job_id"];
            $job["TITLE"] = $row["job_title"];

            $propertyId = $row["property_id"];
            $query = "SELECT * FROM property WHERE property_id = $propertyId";
            $propertresult = mysqli_query($conn, $query);
            $propertyrow = mysqli_fetch_assoc($propertresult);
            $job["PROPERTY"] = $propertyrow["property_name"];

            array_push($jobs, $job);
        }

        echo json_encode($jobs);
    }
    else 
    {
        echo "Error: " . $conn . "<br>" . mysqli_error($conn);
    } 
    
?>