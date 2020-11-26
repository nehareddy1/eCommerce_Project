<?php

    // Get SQL Connection object
    include 'Connection.php';
    $conn = $GLOBALS['SQL_CONN'];

    // Call query on SQL server
    $query = "SELECT * FROM property";
    $result = mysqli_query($conn, $query);
    
    // If we have results 
    if(mysqli_num_rows($result) > 0)
    {
        // Start packaging the query result into a json object 
        $properties = array(); 

        while($row = mysqli_fetch_assoc($result)) 
        {
            // Each property will have a map of property info
            $property = array();   
            $property["ID"] = $row["property_id"];
            $property["NAME"] = $row["property_name"];

            $typeId = $row["type_id"];
            $query = "SELECT * FROM property_type WHERE type_id = $typeId";
            $typeresult = mysqli_query($conn, $query);
            $typerow = mysqli_fetch_assoc($typeresult);
            $property["TYPE"] = $typerow["type_name"];

            $property["PRICE"] = $row["property_price"];
            $property["ADDRESS1"] = $row["property_address1"];
            $property["ADDRESS2"] = $row["property_address2"];
            $zipId = $row["zip_id"];

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
            $property["PARKING"] = $row["property_parking"];
            $property["PET_FRIENDLY"] = $row["pet_allowed"];
            $property["LEASE_MIN"] = $row["min_lease_period"];
            $property["LEASE_MAX"] = $row["max_lease_period"];
            $property["NOTE"] = $row["property_note"];

            $id = $property["ID"];
            $query = "SELECT * FROM property_media WHERE property_id = $id LIMIT 1";
            $imgresult = mysqli_query($conn, $query);
            $imgrow = mysqli_fetch_assoc($imgresult);
            $property["IMAGE"] = $imgrow["media_src"];
            
            // Pack property into properties array 
            array_push($properties, $property);
        }

        // Print out the json object
        echo json_encode($properties);
    }
    else 
    {
        echo "Error: " . $conn . "<br>" . mysqli_error($conn);
    } 
    
?>