<?php
    include 'Connection.php';
    $conn = $GLOBALS['SQL_CONN'];       

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

            array_push($states, $state);
        }
        echo json_encode($states);
    }
    else 
    {
        echo "Error: " . $conn . "<br>" . mysqli_error($conn);
    }  
?>