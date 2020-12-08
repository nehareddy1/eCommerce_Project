<?php
	session_start();
    include 'Connection.php';
    $conn = $GLOBALS['SQL_CONN']; 
	
	$acnum = $_GET['account'];
	$empay = $_GET['email'];
	$phpay = $_GET['phone'];
	$nmpay = $_GET['name'];
	$user_id = $_SESSION['user_id'];
	
	
	$_SESSION['acnum']=$acnum;
	$_SESSION['empay']=$empay;
	$_SESSION['phpay']=$phpay;
	$_SESSION['nmpay']=$nmpay;
				
	$query1 = "SELECT * from account_info where user_id='$user_id'";
	
	$result1 = mysqli_query ($conn, $query1); 
			
	$num_rows = mysqli_num_rows($result1);
	
		if($num_rows>0){
			  		  
		  $query2 = "UPDATE account_info SET account_number = '$acnum', email = '$empay', phone = '$phpay', name = '$nmpay' WHERE user_id = '".$user_id."'";
		    if (mysqli_query($conn, $query2))
			{
				header("Location: ../html/PayInfoUser.php");
				
			}
			else 
			{
				echo "error in query";
			}
		}
		else
		{

			$query = "INSERT into account_info (account_number, email, phone, name, user_id) VALUES ('$acnum','$empay','$phpay','$nmpay','$user_id')";
			if (mysqli_query($conn, $query))
			{
				header("Location: ../html/PayInfoUser.php");
			}
			else 
			{
				echo "error in query";
			}
		}
    
?>