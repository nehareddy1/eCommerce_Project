<?php
	session_start();
    // Get SQL Connection object
    include 'Connection.php';
    $conn = $GLOBALS['SQL_CONN']; 
	
	$fnm = $_GET['fir'];
	$lnm = $_GET['las'];
	$ph = $_GET['ph'];
	$addr = $_GET['add'];
	$ID = $_GET['userId'];
    $PASSWORD = $_GET['password'];
	
	if ($fnm!=null && $lnm!=null && $ph!=null && $addr!=null && $ID!=null && $PASSWORD!=null){
	

		// Call query on SQL server
		$query = "INSERT INTO user_login (first_name, last_name, phone, address, email, password) VALUES ('".$fnm."','".$lnm."','".$ph."','".$addr."','".$ID."','".$PASSWORD."')";

		$result = mysqli_query($conn, $query);
		
		// If we have results 
		if(!$result)
		{ 
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