<?php
    // Get SQL Connection object
    include 'Connection.php';
    $conn = $GLOBALS['SQL_CONN'];       

    $Image_id = json_decode($_GET['ID']);    
    
    $query = "DELETE FROM property_media WHERE media_id = $Image_id";
    mysqli_query($conn, $query);
?>