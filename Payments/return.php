<?php
session_start();
//unset($_SESSION["compare"]);
include '../php/Connection.php';
 $conn = $GLOBALS['SQL_CONN'];


//$item_name = 'Orderforuser'.$_SESSION['id'];
$item_number = $_SESSION['property_id'];
//$user_id = $_SESSION['id'];
$payment_status = 'Success';
$amount = $_SESSION['grand_total'];
$currency = 'USD';
$date = date('Y-m-d');

 $insert_q= mysqli_query($conn,"insert into payment values ('','$item_number','$payment_status','$amount','$currency','$date','')");
 //$insert_q= mysqli_query($conn,"insert into payment values ('','$item_number','$payment_status','$amount','$currency','$date')");
 if($insert_q) {
echo 'succeess';
$_SESSION['paymentStatus'] = "1";
}
else
{
echo 'failed'."insert into payment values ('','$item_number','$payment_status','$amount','$currency','$date','')";
$_SESSION['paymentStatus'] = "0";
}

 //$update_q = mysqli_query($conn,"update prod_orders set order_status = 'Payment Received' where property_id = '$item_number' ")		;
header("Location:../html/BuyPropertiesAdmin.php");
?>

