<?php
	session_start();
    // Get SQL Connection object
    include 'Connection.php';
    $conn = $GLOBALS['SQL_CONN'];       

   $PROPERTY_ID = $_POST['PROPERTY_KEY'];

    // Call query on SQL server
    $query = "SELECT * FROM property_buy WHERE property_id = $PROPERTY_ID";

    $result = mysqli_query($conn, $query);
    
    // If we have results 
    if(mysqli_num_rows($result) == 1)
    {
        // Start packaging the query result into a json object 
        $row = mysqli_fetch_assoc($result); 

        // Each property will have a map of property info
        $property = array();   
        $property["ID"] = $row["property_id"];
        $property["NAME"] = $row["property_name"];

        $property["TYPE"] = $row["type_id"];
        
        $property["PRICE"] = $row["property_price"];
        $property["ADDRESS1"] = $row["property_address1"];
        $property["ADDRESS2"] = $row["property_address2"];

        $property["ZIPID"] = $row["zip_id"];
		$zipId = $property["ZIPID"];
        $query = "SELECT * FROM zip_code WHERE zip_id = $zipId";
        $zipresult = mysqli_query($conn, $query);
        $ziprow = mysqli_fetch_assoc($zipresult);
        $property["ZIPCODE"] = $ziprow["zip_code"];

        $city_id = $ziprow["city_id"];
        $state_id = $ziprow["state_id"];

        $query = "SELECT city_name FROM city WHERE city_id = $city_id";
        $cityresult = mysqli_query($conn, $query);
        $cityrow = mysqli_fetch_assoc($cityresult);
        $property["CITY"] = $cityrow["city_name"];

        $query = "SELECT state_name FROM state WHERE state_id = $state_id";
        $stateresult = mysqli_query($conn, $query);
        $staterow = mysqli_fetch_assoc($stateresult);
        $property["STATE"] = $staterow["state_name"];

        $property["SQUARE_FEET"] = $row["property_square_feet"];
        $property["BED"] = $row["property_bed"];
        $property["BATH"] = $row["property_bath"];
        $property["NOTE"] = $row["buy_description"];

        // Print out the json object
        echo json_encode($property);
    }
    else 
    {
        echo 'error';
    }    
?>