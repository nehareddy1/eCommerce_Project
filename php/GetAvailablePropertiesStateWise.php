<?php
    include 'Connection.php';
    $conn = $GLOBALS['SQL_CONN'];

    $state = $_GET['state'];

    $query = "SELECT zip_id FROM zip_code WHERE state_id = $state";
    $result = mysqli_query($conn, $query);
    $zipIds = array(); 
    if(mysqli_num_rows($result) > 0)
    { 
        while($row = mysqli_fetch_assoc($result)) 
        {
            array_push($zipIds, $row["zip_id"]);
        }
    }

    if(count($zipIds)>0){
        $properties = array();
       
        foreach($zipIds as $value){

            $query1 = "SELECT * FROM property WHERE property_availability = 1 AND zip_id = $value"; 
            $result1 = mysqli_query($conn, $query1);

            if(mysqli_num_rows($result1) > 0) {  
                while($row = mysqli_fetch_assoc($result1)) 
                {
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

                    array_push($properties, $property);
                }
            }
            else if(mysqli_num_rows($result1) < 0)
            {
                echo "Error: " . $conn . "<br>" . mysqli_error($conn);
            }
            
        }  
        echo json_encode($properties);
    }else{
        $properties = array(); 
        echo json_encode($properties);
    }
?>