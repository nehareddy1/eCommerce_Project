<?php
	session_start();
	if(isset($_SESSION['user'])){
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="../style/style.css">
		<script type="text/javascript" src="../JS/AllJobs.js"></script>
		<style>
			#col1 {
				width: 40%;
			}

			#col2 {
				width:60%;
			}

			h2 {
				text-align: center;
				color: #4682B4;
			}
		</style>
	</head>

	<body onload="getJobs();">
		<header>
			<div class="header">
				<a class="active" href="RentalPropertiesAdmin.php"><img src="../images/logo.png" class="logo"></a>
				<h1 class="headerText">Real Estate</h1>
			</div>
		</header>

		<div id="navbar" class="sticky">
			<a href="RentalPropertiesAdmin.php">RENTAL</a>
			<a href=".html">BUY A HOUSE</a>
			<a href="JobsAdmin.php">JOBS</a>
			<a href="../php/AdminLogout.php?logout" style="float: right;">LOGOUT</a>
			<a href="AddJobAdmin.php" style="float: right;">ADD NEW REPAIR JOB</a>
		</div>

		<div>
			<h2> Rental Properties</h2>
			<hr style="width:98%" />
			<table id="jobsTable" align="center" width="45%">
				<colgroup>
					<col id="col1" />
					<col id="col2" />
				</colgroup>
			</table>
		</div>
	</body>
</html>
<?php
	}else{
		header('Location:LoginAdmin.php');
	}
?>