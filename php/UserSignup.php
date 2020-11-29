<?php
    // Get SQL Connection object
    include 'Connection.php';
    $conn = $GLOBALS['SQL_CONN']; 
    
	$fnm = $_POST['fir'];
	$lnm = $_POST['las'];
	$ph = $_POST['ph'];
	$addr = $_POST['add'];
	$ID = $_POST['userId'];
    $PASSWORD = $_POST['password'];
	
	if ($fnm!=null && $lnm!=null && $ph!=null && $addr!=null && $ID!=null && $PASSWORD!=null){
	

		// Call query on SQL server
		$query = "INSERT INTO user_login VALUES ('".$fnm."','".$lnm."','".$ph."','".$addr."','".$ID."','".$PASSWORD."')";

		$result = mysqli_query($conn, $query);
		
		// If we have results 
		if(!$result)
		{   
			header('Location: ../html/LoginUser_Errorsignup.html');   
		}
		else 
		{
			header('Location: ../html/HomeUserLogin.html'); 		
		}  
	
	}
	
	else
		header('Location: ../html/LoginUser_Errorsignup.html');   
?>