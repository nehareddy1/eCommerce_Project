<?php
	session_start();
	if(isset($_SESSION['user'])){
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="../style/style.css">
		<script type="text/javascript" src="../JS/BuyProperty.js"></script>
		<style>
			h2 {
				text-align: center;
				color: #4682B4;
			}

			form {
				text-align: center;
			}
		</style>
	</head>

	<body>
		<header>
			<div class="header">
				<a class="active" href="RentalPropertiesAdmin.php"><img src="../images/logo.png" class="logo"></a>
				<h1 class="headerText">Real Estate</h1>
			</div>
		</header>

		<div id="navbar" class="sticky">
			<a href="RentalPropertiesAdmin.php">RENTAL</a>
			<a href="BuyPropertiesAdmin.php">BUY A HOUSE</a>
			<a href="JobsAdmin.php">JOBS</a>
			<a href="../php/AdminLogout.php?logout" style="float: right;">LOGOUT</a>
		</div>

		<div>
			<h2>Buy Property</h2>
			<hr style="width:98%"/>
			<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
			<input type='hidden' name='business' value='sb-wn9gx4022747@business.example.com'> 
				<input type='hidden' name='item_number' id='propertyId' value=''> 
				<input type='hidden' name='amount' id="amount" value=''> 
				<input type='hidden' name='no_shipping' value='1'> 
				<input type='hidden' name='currency_code' value='USD'> 
				<input type='hidden' name='notify_url' value='https://ec2-3-22-71-79.us-east-2.compute.amazonaws.com/eCommerce_Project-main/Payments/notify.php'>
				<input type='hidden' name='cancel_return' value='https://ec2-3-22-71-79.us-east-2.compute.amazonaws.com/eCommerce_Project-main/Payments/cancel.php'>
				<input type='hidden' name='return' value='https://ec2-3-22-71-79.us-east-2.compute.amazonaws.com/eCommerce_Project-main/Payments/return.php'>
				<input type="hidden" name="cmd" value="_xclick"> 
				<br/>
				<label>Property Title: </label>
				<label id="propertyTitle"></label>
				<br/>
				<br/>
				<label>Price: $</label>
				<label id="propertyPrice"></label>
				<br/>
				<br/>
				<input type="submit" name="pay_now" id="pay_now" Value="Buy Now" class="button">
			</form>
		</div>
		<script>getProperty(<?php echo $_GET['ID']; ?>); 
                </script>
	</body>
</html>
<?php
		$_SESSION['property_id'] = $_GET['ID'];
		$_SESSION['grand_total'] = $_GET['price'];
	}else{
		header('Location:LoginAdmin.php');
	}
?>