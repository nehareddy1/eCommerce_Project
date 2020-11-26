<?php
    // Get SQL Connection object
    include 'Connection.php';
    $conn = $GLOBALS['SQL_CONN'];

    $PROPERTY_ID = $_POST['PROPERTY_KEY'];

    // Call query on SQL server
    $query = "SELECT * FROM property_media WHERE property_id = $PROPERTY_ID";
    $result = mysqli_query($conn, $query);
    
    // If we have results 
    if(mysqli_num_rows($result) > 0){

        $images = array();

        while($row = mysqli_fetch_assoc($result)){
            $image = array();   
            $image["MEDIAID"] = $row["media_id"];
            $image["MEDIASRC"] = $row["media_src"];
            array_push($images, $image);
        }   
        // Print out the json object
        echo json_encode($images);
    }
    else 
    {
        echo 'error';
    }    
?>