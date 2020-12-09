<?php
	session_start();
	if(isset($_SESSION['user'])){
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="../style/style.css">
		<script type="text/javascript" src="../JS/BuyPropertiesAdmin.js"></script>
		<style>
			table{
				width: 95%;
			}

			th{
				text-align: left;
				color: #4682B4;	
			}

			#col1 {
				width: 20%;
			}

			#col2 {
				width:20%;
			}

			#col3 {
				width:40%;
			}

			#col4 {
				width:20%;
			}

			#popupcol {
                width: 33%;
            }

			h2 {
				text-align: center;
				color: #4682B4;
			}
		</style>
	</head>

	<body onload="getBuyProperties();">
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
			<h2>Buy Properties</h2>
			<hr style="width:98%"/>
			<table id="propertiesTable" align="center">
				<colgroup>
					<col id="col1" />
					<col id="col2" />
					<col id="col3" />
					<col id="col4" />
				</colgroup>
				<tr>
					<th colspan="2">Property Details</th>
					<th colspan="2">Contact Details</th>
				</tr>
			</table>
		</div>

		<div id="imagePopup" class="popup">
            <div class="popup-content" align="center" style="width:40%;margin-top:180px;">
                <span class="close">&times;</span>
                <div name="extraInfo">
                    <div>
                        <a href="" target="_blank" id="link"><img id="slider" src="" /></a>
                    </div>
                    <br />
                    <input type="button" class="button" onclick="previous()" value="Previous" id="previous" />
                    <input type="button" class="button" onclick="next()" value="Next" id="next" />
                </div>
            </div>
        </div>

		<div id="propertyPopup" class="popup">
            <div class="popup-content" align="center" style="width:40%;margin-top:180px;">
                <span class="close">&times;</span>
                <h3 id="propTitle" class="text" style="padding:0px;"></h3>
                <div name="extraInfo">
                    <table align="center" width="100%">
                        <colgroup>
                            <col id="popupcol">
                            <col id="popupcol">
                            <col id="popupcol">
                        </colgroup>
                        <tr>
                            <td valign="top">
                                <label id="sqft" class="title" style="font-size:15px;">Floor Area</label>
                            </td>
                            <td valign="top">
                                <label id="bed" class="title" style="font-size:15px;">Bed</label>                               
                            </td>
                            <td valign="top">
                                <label id="bath" class="title" style="font-size:15px;">Bath</label>
                            </td>
                        </tr>
						<tr>
							<td colspan="3">
								<label id="note" class="title" style="font-size:15px;">Note</label>
							</td>
						</tr>
                    </table>
                </div>
            </div>
        </div>
	</body>
</html>
<?php
	}else{
		header('Location:LoginAdmin.php');
	}
?>