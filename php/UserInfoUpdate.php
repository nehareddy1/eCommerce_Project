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
	$user_id = $_SESSION['user_id'];
	
	if ($fnm!=null && $lnm!=null && $ph!=null && $addr!=null && $ID!=null && $PASSWORD!=null){
	

		// Call query on SQL server
		$query = "UPDATE user_login SET first_name = '".$fnm."', last_name = '".$lnm."', phone = '".$ph."', address = '".$addr."', email = '".$ID."', password = '".$PASSWORD."' WHERE user_id = '".$user_id."'";

		$result = mysqli_query($conn, $query);
		
		// If we have results 
		if(!$result)
		{ 
			print "<p>Info not updated</p>"; 
		}
		else 
		{
			
			$query1 = "SELECT * from user_login where email='$ID' && password='$PASSWORD'";
	
			$result1 = mysqli_query ($conn, $query1); 
			
			$num_rows = mysqli_num_rows($result1);
			
			for ($i = 0; $i < $num_rows; $i++)
          {
              $row = mysqli_fetch_assoc($result1);
			  
			  $_SESSION['user_id']=$row['user_id'];
			  $_SESSION['fn']=$row['first_name'];
			  $_SESSION['ln']=$row['last_name'];
			  $_SESSION['ph']=$row['phone'];
			  $_SESSION['adr']=$row['address'];
			  $_SESSION['em']=$row['email'];
			  $_SESSION['pw']=$row['password'];
			  
		  }
			header("Location: ../html/InfoUpdate.php");
			
		}  
	
	}
	
	else
		print "<p>Info not provided, please fill all items</p>"; 
?>