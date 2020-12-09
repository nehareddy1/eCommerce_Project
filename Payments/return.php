<?php
session_start();
//unset($_SESSION["compare"]);
include 'Connection.php';
 $conn = $GLOBALS['SQL_CONN'];


//$item_name = 'Orderforuser'.$_SESSION['id'];
$item_number = $_SESSION['property_id'];
//$user_id = $_SESSION['id'];
$payment_status = 'Success';
$amount = $_SESSION['grand_total'];
$currency = 'USD';
$date = date('Y-m-d');

 $insert_q= mysqli_query($conn,"insert into payment values ('','$item_number','$payment_status','$amount','$currency','','$date')");
 //$insert_q= mysqli_query($conn,"insert into payment values ('','$item_number','$payment_status','$amount','$currency','','$date')");
 if($insert_q) {
echo 'succeess';
}
else
{
echo 'failed'."insert into payment values ('','$item_number','$payment_status','$amount','$currency','','$date')";
}

 //$update_q = mysqli_query($conn,"update prod_orders set order_status = 'Payment Received' where property_id = '$item_number' ")		;

?>

<html>
<head>
<title>Order Placed</title>
<style>
.response-text {
    display: inline-block;
    max-width: 550px;
    margin: 0 auto;
    font-size: 1.5em;
    text-align: center;
    background: #fff3de;
    padding: 42px;
    border-radius: 3px;
    border: #f5e9d4 1px solid;
    font-family: arial;
    line-height: 34px;
}
</style>
</head>
<body>
    <div class="response-text">
        You have placed your order successfully.<br> Thank you for
        shopping with us! 
		<a href="GetBuyPropertiesAdmin.php" > Click here to return to the main merchant page </a>
    </div>
</body>
</html>