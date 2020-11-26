<?php
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
			session_start();
			header('Location: ../html/HomeUserLogin.html');   
		}
		else 
		{
			header('Location: ../html/LoginUser_Errorcredentialpage.html');
		} 

	}
	
	else
		header('Location: ../html/LoginUser_Errorcredentialpage.html'); 
?>