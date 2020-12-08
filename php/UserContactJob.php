<?php
    include 'Connection.php';
    $conn = $GLOBALS['SQL_CONN']; 
    
	$nm = $_GET['name'];
	$addrs = $_GET['add'];
	$ph = $_GET['phone'];
	$Jbid = $_GET['jId'];
	
	if ($nm!=null && $addrs!=null && $ph!=null){

		$query = "INSERT INTO contact_job_user VALUES ('".$nm."','".$addrs."','".$ph."','$Jbid')";
		$result = mysqli_query($conn, $query);
		
		if(!$result){   
			print "<p>Enter correct details</p>";   
		}else{
			header("Location: ../html/JobsUser.html");
		}
	}else
		print "<p>Please enter details</p>";
?>