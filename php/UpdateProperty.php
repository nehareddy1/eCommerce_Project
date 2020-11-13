<?php

    // Get SQL Connection object
    include 'Connection.php';
    $conn = $GLOBALS['SQL_CONN'];  

    $PROPERTY = json_decode($_POST['PAYLOAD']);    
    
    $PROPERTY_ID = $PROPERTY->property_id;
    $PROPERTY_NAME = $PROPERTY->propery_name;
    $PROPERTY_TYPE = $PROPERTY->type_id;
    $PROPERTY_PRICE = $PROPERTY->propery_price;
    $PROPERTY_ADDRESS1 = $PROPERTY->property_address1;
    $PROPERTY_ADDRESS2 = $PROPERTY->property_address2;
    $PROPERTY_ZIP = $PROPERTY->zip_id;
    $PROPERTY_AVAILABLE = $PROPERTY->property_availability;
    $PROPERTY_SQUARE_FEET = $PROPERTY->property_square_feet;
    $PROPERTY_BED = $PROPERTY->property_bed;
    $PROPERTY_BATH = $PROPERTY->property_bath;
    $PROPERTY_PARKING = $PROPERTY->property_parking;
    $PROPERTY_PET_FRIENDLY = $PROPERTY->pet_allowed;
    $PROPERTY_LEASE_MIN = $PROPERTY->min_lease_period;
    $PROPERTY_LEASE_MAX = $PROPERTY->max_lease_period;
    $PROPERTY_NOTE = $PROPERTY->property_note;
    
    $query = "UPDATE property SET 
                propery_name = $PROPERTY_NAME,
                type_id = '$PROPERTY_TYPE',
                propery_price = $PROPERTY_PRICE,
                property_address1 = '$PROPERTY_ADDRESS1',
                property_address2 = '$PROPERTY_ADDRESS2',
                zip_id = $PROPERTY_ZIP,
                property_availability = $PROPERTY_AVAILABLE,
                property_square_feet = $PROPERTY_SQUARE_FEET,
                property_bed = $PROPERTY_BED,
                property_bath = $PROPERTY_BATH,
                property_parking = '$PROPERTY_PARKING',
                pet_allowed = $PROPERTY_PET_FRIENDLY,
                min_lease_period = '$PROPERTY_LEASE_MIN',
                max_lease_period = '$PROPERTY_LEASE_MAX',
                property_note = '$PROPERTY_NOTE'
                WHERE property_id = $PROPERTY_ID";

    if (mysqli_query($conn, $query))
    {
        echo "Property updated";
    }
    else 
    {
        echo "Error: " . $conn . "<br>" . mysqli_error($conn);
    }
?>