<?php 
session_start();
include 'Connection.php';
 $conn = $GLOBALS['SQL_CONN'];

//$item_name = 'Orderforuser'.$_SESSION['id'];
$item_number = $_SESSION['property_id'];
//$user_id = $_SESSION['id'];
$payment_status = 'Cancelled';
$amount = $_SESSION['grand_total'];
$currency = 'USD';
$date = date('Y-m-d');


 $insert_q= mysqli_query($conn,"insert into payment values ('','$item_number','$payment_status','$amount','$currency','','$date')");
 //$update_q = mysqli_query($conn,"update prod_orders set order_status = 'Payment Cancelled' where property_id = '$item_number' ")		;
	

?>

Sorry! Payment Cancelled.
<a href="GetBuyPropertiesAdmin.php" > Click here to return to the main merchant page </a>