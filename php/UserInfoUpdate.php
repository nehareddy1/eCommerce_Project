<?php
    // Get SQL Connection object
    include 'Connection.php';
    $conn = $GLOBALS['SQL_CONN']; 
	
	$fnm = $_GET['fir'];
	$lnm = $_GET['las'];
	$ph = $_GET['ph'];
	$addr = $_GET['add'];
	$ID = $_GET['userId'];
    $PASSWORD = $_GET['password'];
	$uid=1;
	
	if ($fnm!=null && $lnm!=null && $ph!=null && $addr!=null && $ID!=null && $PASSWORD!=null){
	

		// Call query on SQL server
		$query = "UPDATE user_login SET first_name = '".$fnm."', last_name = '".$lnm."', phone = '".$ph."', address = '".$addr."', email = '".$ID."', password = '".$PASSWORD."' WHERE user_id = '".$uid."'";

		$result = mysqli_query($conn, $query);
		
		// If we have results 
		if(!$result)
		{ 
			print "<p>Info not updated</p>"; 
		}
		else 
		{
			print "<p>Info updated</p>"; 		
		}  
	
	}
	
	else
		print "<p>Info not provided, please fill all items</p>"; 
?>