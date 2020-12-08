<?php
	session_start();
    // Get SQL Connection object
    include 'Connection.php';
    $conn = $GLOBALS['SQL_CONN'];  

    $PROPERTY_ID = $_POST['propertyId'];
    $PROPERTY_TYPE = $_POST['propertyType'];
	$PROPERTY_PRICE = $_POST['propertyPrice'];
    $PROPERTY_ADDRESS1 = $_POST['propertyAddress1'];
    $PROPERTY_ADDRESS2 = $_POST['propertyAddress2'];
    $PROPERTY_ZIP = $_POST['propertyZip'];
	
    $PROPERTY_SQUARE_FEET = $_POST['propertySqrFt'];
	$PROPERTY_BED = $_POST['propertyBed'];
    $PROPERTY_BATH = $_POST['propertyBath'];
    $PROPERTY_NOTE = $_POST['propertyNote'];
    
    $query = "UPDATE property_buy SET 
                type_id = '$PROPERTY_TYPE',
                property_price = '$PROPERTY_PRICE',
                property_address1 = '$PROPERTY_ADDRESS1',
                property_address2 = '$PROPERTY_ADDRESS2',
                zip_id = '$PROPERTY_ZIP',
                property_square_feet = '$PROPERTY_SQUARE_FEET',
                property_bed = '$PROPERTY_BED',
                property_bath = '$PROPERTY_BATH',
                buy_description = '$PROPERTY_NOTE'
                WHERE property_id = $PROPERTY_ID";

    if (mysqli_query($conn, $query))
    {
        header("Location: ../html/HomeUserLogin.php");
    }
    else 
    {
        echo "Error";
    }
?>