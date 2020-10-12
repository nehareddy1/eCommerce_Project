<?php

    // Get SQL Connection object
    include 'ConnectToSQL.php';
    $conn = $GLOBALS['SQL_CONN'];       

    // Call query on SQL server
    $query = 'SELECT * FROM ANDREWSDREAMLLC.home_page;';
    $result = mysqli_query($conn, $query);
    
    // If we have results 
    if(mysqli_num_rows($result) == 1)
    {
        // Start packaging the query result into a json object 
        $row = mysqli_fetch_assoc($result);
        $home_page = array();   
        $home_page["PARAGRAPH_TEXT"] = $row["HOME_PARAGRAPH_TEXT"];
        $home_page["IMAGE"] = $row["HOME_IMAGE"];
        $home_page["VIDEO_URL"] = $row["HOME_VIDEO_URL"];

        // Print out the json object
        echo json_encode($home_page); 

    }
    else if(mysqli_num_rows($result) < 1)
    {
        echo "Error: " . $conn . "<br>" . mysqli_error($conn);
    }
    else // 1 means good, <1 means error, >1 means somethings wrong with the table
    {
        echo "Error: home_page table should only have one row";
    }
    
?>