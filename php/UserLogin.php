<?php
    session_start();
	// Get SQL Connection object
    include 'Connection.php';
    $conn = $GLOBALS['SQL_CONN']; 
	
    $PASSWORD = $_POST['password'];
	$ID = $_POST['userId'];
	
	$_SESSION['acnum']='';
	$_SESSION['empay']='';
	$_SESSION['phpay']='';
	$_SESSION['nmpay']='';
	
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
		  
		  $user_id = $_SESSION['user_id'];
		  //************************************************This is for pay user info retrieval
		  $query3 = "SELECT * from account_info where user_id='$user_id'";
		  
			$result3 = mysqli_query ($conn, $query3); 
					
              $row3 = mysqli_fetch_assoc($result3);
			  
			    $_SESSION['acnum']=$row3['account_number'];
				$_SESSION['empay']=$row3['email'];
				$_SESSION['phpay']=$row3['phone'];
				$_SESSION['nmpay']=$row3['name'];

		  //*************************************************
		  
		  $_SESSION['user2'] = 'user2';
		  header("Location: ../html/HomeUserLogin.php");
		}
		else 
		{
			header("Location: ../html/LoginUser.php?Invalid= Please Enter Correct User Name and Password&User= $ID");
		} 
	}
	else
		header("Location: ../html/LoginUser.php?Invalid= Please Enter User Name and Password"); 
?>