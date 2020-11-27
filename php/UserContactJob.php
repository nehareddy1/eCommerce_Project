<?php
    // Get SQL Connection object
    include 'Connection.php';
    $conn = $GLOBALS['SQL_CONN']; 
    
	$nm = $_POST['per1'];
	$addrs = $_POST['addr'];
	$ph = $_POST['phn'];
	
	if ($nm!=null && $addrs!=null && $ph!=null){
	

		// Call query on SQL server
		$query = "INSERT INTO contact_job_user VALUES ('".$nm."','".$addrs."','".$ph."')";

		$result = mysqli_query($conn, $query);
		
		// If we have results 
		if(!$result)
		{   
			print "<p>Enter correct details</p>";   
		}
		else 
		{
			print "<p>Submitted the info successfully</p>"; 		
		}  
	}
	else
		print "<p>Please enter details</p>"; 
?>