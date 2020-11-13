<?php
    // Get SQL Connection object
    include 'Connection.php';
    $conn = $GLOBALS['SQL_CONN'];       

    $PROPERTY = json_decode($_POST['PAYLOAD']);

    $PROPERTY_NAME = $PROPERTY->property_name;
    $PROPERTY_TYPE = $PROPERTY->type_id;
    $PROPERTY_PRICE = $PROPERTY->property_price;
    $PROPERTY_ADDRESS1 = $PROPERTY->property_address1;
    $PROPERTY_ADDRESS2 = $PROPERTY->property_address2;
    $PROPERTY_ZIP = $PROPERTY->zip_id;
    $PROPERTY_AVAILABLE = true;
    $PROPERTY_SQUARE_FEET = $PROPERTY->property_square_feet;
    $PROPERTY_BED = $PROPERTY->	property_bed;
    $PROPERTY_BATH = $PROPERTY->property_bath;
    $PROPERTY_PARKING = $PROPERTY->	property_parking;
    $PROPERTY_PET_FRIENDLY = $PROPERTY->pet_allowed;
    $PROPERTY_LEASE_MIN = $PROPERTY->min_lease_period;
    $PROPERTY_LEASE_MAX = $PROPERTY->max_lease_period;
    $PROPERTY_NOTE = $PROPERTY->property_note;

    $query = "INSERT INTO property (property_name, type_id, property_price, property_address1, property_address2, zip_id, property_availability, 
              property_square_feet, property_bed, property_bath, property_parking, pet_allowed, min_lease_period, max_lease_period, property_note)
              VALUES('$PROPERTY_NAME','$PROPERTY_TYPE',$PROPERTY_PRICE, '$PROPERTY_ADDRESS1','$PROPERTY_ADDRESS2','$PROPERTY_ZIP','$PROPERTY_AVAILABLE',
              '$PROPERTY_SQUARE_FEET','$PROPERTY_BED',$PROPERTY_BATH, '$PROPERTY_PARKING', '$PROPERTY_PET_FRIENDLY','$PROPERTY_LEASE_MIN','$PROPERTY_LEASE_MAX','$PROPERTY_NOTE')";
            
    mysqli_query($conn, $query);

    //Get primary key
    /*$PROPERTY_ID = mysqli_insert_id($conn);
    
    $PROPERTY_MEDIA = $PROPERTY->media_src;

    $query = "INSERT INTO property_media (media_src, property_id) VALUES('$PROPERTY_MEDIA','$PROPERTY_ID')";
    mysqli_query($conn, $query);*/

    //echo json_encode($PROPERTY_ID);
?>