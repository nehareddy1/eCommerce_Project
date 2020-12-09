<?php
    include 'Connection.php';
    $conn = $GLOBALS['SQL_CONN'];

    $query = "SELECT * FROM property_buy where property_id NOT IN (select property_id from payment)";
    $result = mysqli_query($conn, $query);
    
    if(mysqli_num_rows($result) > 0){

        $properties = array(); 

        while($row = mysqli_fetch_assoc($result)) {
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
            $property["DESCRIPTION"] = $row["buy_description"];

            $userId = $row["user_id"];
            $query = "SELECT * FROM user_login WHERE user_id = $userId";
            $userresult = mysqli_query($conn, $query);
            $userrow = mysqli_fetch_assoc($userresult);
            $property["USERNAME"] = $userrow["first_name"] ." ". $userrow["last_name"];
            $property["USERADD"] = $userrow["address"];
            $property["USERPHONE"] = $userrow["phone"];
            $property["USEREMAIL"] = $userrow["email"];

            $id = $property["ID"];
            $query = "SELECT * FROM property_media_buy WHERE property_id = $id LIMIT 1";
            $imgresult = mysqli_query($conn, $query);
            $imgrow = mysqli_fetch_assoc($imgresult);
            $property["IMAGE"] = $imgrow["media_src"];

            array_push($properties, $property);
        }
        echo json_encode($properties);
    }
?>