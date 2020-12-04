<?php
    // Get SQL Connection object
    include 'Connection.php';
    $conn = $GLOBALS['SQL_CONN']; 
    

	$name = $_POST['name'];
	setcookie('name', $name);
	
	$fnm = $_POST['fir'];
	$lnm = $_POST['las'];
	$ph = $_POST['ph'];
	$addr = $_POST['add'];
	$ID = $_POST['userId'];
    $PASSWORD = $_POST['password'];
	
	if ($fnm!=null && $lnm!=null && $ph!=null && $addr!=null && $ID!=null && $PASSWORD!=null){
	

		// Call query on SQL server
		$query = "INSERT INTO user_login (first_name, last_name, phone, address, email, password) VALUES ('".$fnm."','".$lnm."','".$ph."','".$addr."','".$ID."','".$PASSWORD."')";

		$result = mysqli_query($conn, $query);
		
		// If we have results 
		if(!$result)
		{ // ********************************************** ERROR MESSAGE PAGE *********************************
		    
			
			header('Location: ../html/LoginUser.php');   
		}
		else 
		{
			header('Location: ../html/HomeUserLogin.html'); 		
		}  
	
	}
	
	else
		header('Location: ../html/LoginUser.php'); 
?>