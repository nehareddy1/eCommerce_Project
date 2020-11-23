<?php
    // Get SQL Connection object
    include 'Connection.php';
    $conn = $GLOBALS['SQL_CONN']; 
    
    $PASSWORD = $_POST['password'];

    // Call query on SQL server
    $query = "SELECT * FROM admin_login WHERE admin_id = 1";

    $result = mysqli_query($conn, $query);
    
    // If we have results 
    if(mysqli_num_rows($result) == 1)
    {   
        $pwd = $row["admin_password"];
        if($PASSWORD == $pwd){
            session_start();
            $_SESSION["user"] = "Admin";
            if(isset($_SESSION["user"])) {
                header("Location: ../html/HomeAdmin.js");
                http_response_code(202);
            }  
        }else{
            header("Location: ../html/AdminLogin.js");
            http_response_code(401);
        }
        exit();
    }
    else 
    {
        echo "Error: " . $conn . "<br>" . mysqli_error($conn);
    }  
?>