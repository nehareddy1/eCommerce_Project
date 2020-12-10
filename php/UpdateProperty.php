<?php
    include 'Connection.php';
    $conn = $GLOBALS['SQL_CONN'];  

    $PROPERTY_ID = $_POST['propertyId'];
    $PROPERTY_TYPE = $_POST['propertyType'];
	$PROPERTY_PRICE = $_POST['propertyPrice'];
    $PROPERTY_ADDRESS1 = $_POST['propertyAddress1'];
    $PROPERTY_ADDRESS2 = $_POST['propertyAddress2'];
    $PROPERTY_ZIP = $_POST['zipID'];
	
	if(isset($_POST['propertyAvailable'])){
		$PROPERTY_AVAILABLE = 1;
	}
	else{
		$PROPERTY_AVAILABLE = 0;
	}

    $PROPERTY_PARKING = $_POST['propertyParking'];
    $PROPERTY_PET_FRIENDLY = $_POST['propertyPet'];
    $PROPERTY_SQUARE_FEET = $_POST['propertySqrFt'];
	$PROPERTY_BED = $_POST['propertyBed'];
    $PROPERTY_BATH = $_POST['propertyBath'];
    $PROPERTY_NOTE = $_POST['propertyNote'];
    
    $query = "UPDATE property SET 
                type_id = $PROPERTY_TYPE,
                property_price = $PROPERTY_PRICE,
                property_address1 = '$PROPERTY_ADDRESS1',
                property_address2 = '$PROPERTY_ADDRESS2',
                zip_id = $PROPERTY_ZIP,
                property_availability = $PROPERTY_AVAILABLE,
                property_square_feet = '$PROPERTY_SQUARE_FEET',
                property_bed = '$PROPERTY_BED',
                property_bath = '$PROPERTY_BATH',
                property_parking = '$PROPERTY_PARKING',
                pet_allowed = $PROPERTY_PET_FRIENDLY,
                min_lease_period = '$PROPERTY_LEASE_MIN',
                max_lease_period = '$PROPERTY_LEASE_MAX',
                property_note = '$PROPERTY_NOTE'
                WHERE property_id = $PROPERTY_ID";
    
    echo $query;

    if (mysqli_query($conn, $query))
    {
        header("Location: ../html/RentalPropertiesAdmin.php");
    }
    else 
    {
        echo "Error: " . $conn . "<br>" . mysqli_error($conn);
    }
?>