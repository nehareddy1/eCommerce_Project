<?php

    // Get SQL Connection object
    include 'Connection.php';
    $conn = $GLOBALS['SQL_CONN'];       

    $PROPERTY_ID = $_POST['property_id'];

    // Call query on SQL server
    $query = "SELECT * FROM property WHERE property_id = $PROPERTY_ID";

    $result = mysqli_query($conn, $query);
    
    // If we have results 
    if(mysqli_num_rows($result) == 1)
    {
        // Start packaging the query result into a json object 
        $row = mysqli_fetch_assoc($result); 

        // Each property will have a map of property info
        $property = array();   
        $property["ID"] = $row["property_id"];
        $property["NAME"] = $row["propery_name"];
        $property["TYPE"] = $row["type_id"];
        $property["PRICE"] = $row["propery_price"];
        $property["ADDRESS1"] = $row["property_address1"];
        $property["ADDRESS2"] = $row["property_address2"];
        $property["ZIP"] = $row["zip_id"];
        $property["AVAILABLE"] = $row["property_availability"];
        $property["SQUARE_FEET"] = $row["property_square_feet"];
        $property["BED"] = $row["property_bed"];
        $property["BATH"] = $row["property_bath"];
        $property["PARKING"] = $row["property_parking"];
        $property["PET_FRIENDLY"] = $row["pet_allowed"];
        $property["LEASE_MIN"] = $row["min_lease_period"];
        $property["LEASE_MAX"] = $row["max_lease_period"];
        $property["NOTE"] = $row["property_note"];

        // Print out the json object
        //echo json_encode($property);
    }
    else 
    {
        echo 'error';
    }    
?>