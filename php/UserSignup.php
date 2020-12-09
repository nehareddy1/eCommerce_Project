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
			header('Location: ../html/LoginUser.php?Invalid1= Please Enter Correct details as required&fnm=$fnm&lnm=$lnm&ph=$ph&addr=$addr&ID=$ID&pw=$PASSWORD');   
		}
		else 
		{
			$_SESSION['user2'] = 'user2';
			
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
			
			header('Location: ../html/HomeUserLogin.php'); 		
		}  
	}
	
	else
		header('Location: ../html/LoginUser.php?Invalid1= Please Enter Correct details as required&fnm=$fnm&lnm=$lnm&ph=$ph&addr=$addr&ID=$ID&pw=$PASSWORD'); 
?>