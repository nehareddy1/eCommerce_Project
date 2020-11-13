<?php
    // Get SQL Connection object
    include 'Connection.php';
    $conn = $GLOBALS['SQL_CONN']; 
    
    $TYPE_ID = $_POST['type_id'];

    // Call query on SQL server
    $query = "SELECT * FROM property_type WHERE type_id = $TYPE_ID";

    $result = mysqli_query($conn, $query);
    
    // If we have results 
    if(mysqli_num_rows($result) == 1)
    {   
        $type= $row["type_name"];
    }
    else 
    {
        echo "Error: " . $conn . "<br>" . mysqli_error($conn);
    }  
?>