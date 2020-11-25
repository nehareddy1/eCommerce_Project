<?php
    // Get SQL Connection object
    include 'Connection.php';
    $conn = $GLOBALS['SQL_CONN'];       

    $zip_code = $_POST['zip_code'];
	$CS = array();
	// Call query on SQL server
    $query = "SELECT * FROM zip_code WHERE zip_code = $zip_code";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) > 0)
    { 
        $row = mysqli_fetch_assoc($result);
        $CS["Zip"] = $row["zip_id"];
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
        $row = mysqli_fetch_assoc($result);
        $CS["City"] = $row["city_name"];
    }
    else 
    {
        echo "Error: " . $conn . "<br>" . mysqli_error($conn);
    } 

    $query = "SELECT state_name FROM state WHERE state_id = $state_id";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) > 0)
    {
        $row = mysqli_fetch_assoc($result);
        $CS["State"] = $row["state_name"];
    }
    else 
    {
        echo "Error: " . $conn . "<br>" . mysqli_error($conn);
    } 
    echo json_encode($CS);
?>