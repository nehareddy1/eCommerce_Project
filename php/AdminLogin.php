<?php
	session_start();
    include 'Connection.php';
    $conn = $GLOBALS['SQL_CONN']; 
    
    $PASSWORD = $_POST['password'];
	$ID = $_POST['userId'];
	
	if ($ID!=null && $PASSWORD!=null){
	
		$query = "SELECT * FROM admin_login where Email='$ID' && admin_password='$PASSWORD'";

		$result = mysqli_query($conn, $query);
		
		if(mysqli_num_rows($result) == 1)
		{   
			$_SESSION['user'] = 'admin';
			header('Location: ../html/RentalPropertiesAdmin.php');   
		}
		else 
		{
			$_SESSION['error'] = $ID;
			header('Location: ../html/LoginAdmin.php');
		} 
	}else{
		$_SESSION['error'] = true;
		header("Location: ../html/LoginAdmin.php"); 
	}
?>