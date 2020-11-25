<?php

    // Get SQL Connection object
    include 'Connection.php';
    $conn = $GLOBALS['SQL_CONN'];       

    // There are three tables per property. Update each of them 
    $PROPERTY_KEY = json_decode($_GET['ID']);    
    
    $query = "DELETE FROM property WHERE PROPERTY_ID = $PROPERTY_KEY";
    mysqli_query($conn, $query);

    echo json_encode($PROPERTY_KEY);
?>