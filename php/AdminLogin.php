<?php
    // Get SQL Connection object
    include 'Connection.php';
    $conn = $GLOBALS['SQL_CONN']; 
    
    $PASSWORD = $_POST['password'];
	$ID = $_POST['userId'];
	
	if ($ID!=null && $PASSWORD!=null){

		// Call query on SQL server	
		$query = "SELECT * FROM admin_login where Email='$ID' && admin_password='$PASSWORD'";

		$result = mysqli_query($conn, $query);
		
		// If we have results 
		if(mysqli_num_rows($result) == 1)
		{   
			session_start();
			header('Location: ../html/RentalPropertiesAdmin.html');   
		}
		else 
		{
			header('Location: ../html/AdminUser_Errorcredentialpage.html');
		} 

	}
	
	else
		header('Location: ../html/AdminUser_Errorcredentialpage.html'); 
?>