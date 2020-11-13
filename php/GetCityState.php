<?php
    // Get SQL Connection object
    include 'Connection.php';
    $conn = $GLOBALS['SQL_CONN'];       

    // Call query on SQL server
    $query = "SELECT * FROM zip_code";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) > 0)
    { 
        $zip_id = $row["zip_id"];
        $city_id = $row["city_id"];
        $state_id = $row["state_id"];
    }
    else 
    {
        echo "Error: " . $conn . "<br>" . mysqli_error($conn);
    } 
    
    $query = "SELECT city_name FROM city WHERE city_id = $city_id";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) > 0)
    { 
        $city = $row["city_name"];
    }
    else 
    {
        echo "Error: " . $conn . "<br>" . mysqli_error($conn);
    } 

    $query = "SELECT sate_name FROM state WHERE state_id = $state_id";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) > 0)
    { 
        $state = $row["state_name"];
    }
    else 
    {
        echo "Error: " . $conn . "<br>" . mysqli_error($conn);
    } 
?>