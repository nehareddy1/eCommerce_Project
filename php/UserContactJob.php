<?php
    include 'Connection.php';
    $conn = $GLOBALS['SQL_CONN']; 
    
	$nm = $_POST['name'];
	$addrs = $_POST['add'];
	$ph = $_POST['phone'];
	$Jbid = $_POST['jId'];
	
	if ($nm!=null && $addrs!=null && $ph!=null){

		$query = "INSERT INTO contact_job_user VALUES ('".$nm."','".$addrs."','".$ph."','$Jbid')";
		$result = mysqli_query($conn, $query);
		
		if(!$result){   
			print "<p>Enter correct details</p>";   
		}  
	}else
		print "<p>Please enter details</p>"; 
?>