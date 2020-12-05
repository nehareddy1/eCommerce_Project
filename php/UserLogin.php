<?php
    session_start();
	// Get SQL Connection object
    include 'Connection.php';
    $conn = $GLOBALS['SQL_CONN']; 
	
    $PASSWORD = $_POST['password'];
	$ID = $_POST['userId'];
	
	if ($ID!=null && $PASSWORD!=null){

		// Call query on SQL server	
		$query = "SELECT * FROM user_login where email='$ID' && password='$PASSWORD'";

		$result = mysqli_query($conn, $query);
		
		// If we have results 
		if(mysqli_num_rows($result) == 1)
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
		  header("Location: ../html/HomeUserLogin.php");
		}
		else 
		{
			header('Location: ../html/LoginUser.php');
		} 
	}
	else
		header('Location: ../html/LoginUser.php'); 
?>