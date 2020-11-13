<?php
    // Get SQL Connection object
    include 'Connection.php';
    $conn = $GLOBALS['SQL_CONN'];       

    // Call query on SQL server
    $query = "SELECT * FROM state";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0)
    { 
        $states = array();

        while($row = mysqli_fetch_assoc($result)) 
        {
            $state = array();   
            $state["StateId"] = $row["state_id"];
            $state["StateName"] = $row["state_name"];
                       
            // Pack property into properties array 
            array_push($states, $state);
        }
    }
    else 
    {
        echo "Error: " . $conn . "<br>" . mysqli_error($conn);
    }  
?>