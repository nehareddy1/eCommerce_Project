<?php
    // Get SQL Connection object
    include 'Connection.php';
    $conn = $GLOBALS['SQL_CONN'];       

    // Call query on SQL server
    $query = "SELECT * FROM property_type";
    $result = mysqli_query($conn, $query);
    
    // If we have results 
    if(mysqli_num_rows($result) > 0)
    { 
        $types = array();

        while($row = mysqli_fetch_assoc($result)) 
        {
            $type = array();   
            $type["TypeId"] = $row["type_id"];
            $type["TypeName"] = $row["type_name"];
                       
            // Pack property into properties array 
            array_push($types, $type);
        }
        echo json_encode($types);
    }
    else 
    {
        echo "Error: " . $conn . "<br>" . mysqli_error($conn);
    }  
?>