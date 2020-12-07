<?php
	session_start();
	if(isset($_SESSION['user'])){
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../style/style.css">
        <script type="text/javascript" src="../JS/GetProperties.js" charset="utf-8"></script>
        <style>
            table {
                width:50%;
            }
            h2 {
                text-align: center;
                color: #4682B4;
            }
            #col1 {
                width:30%;
            }
            #col2 {
                width: 70%;
            }
        </style>
    </head>

    <body onload="getProperties();">

        <header>
	        <div class="header">
		        <a class="active" href="RentalPropertiesAdmin.php"><img src="../images/logo.png" class="logo"></a>
		        <h1 class="headerText">Real Estate</h1>
		    </div>
        </header>

	    <div id="navbar" class="sticky">
	        <a href="RentalPropertiesAdmin.php">RENTAL</a>
            <a href="BuyPropertiesAdmin.php">BUY A HOUSE</a>
            <a href="JobsAdmin.php">JOB</a>
            <a href="../php/AdminLogout.php?logout" style="float: right;">LOGOUT</a>
	    </div>

        <h2>Add New Repair Job</h2>
        <hr style="width:98%"/>
        <form method = "POST" action = "../php/InsertJob.php">
            <table align="center">
                <colgroup>
                    <col id="col1">
                    <col id="col2">
                </colgroup>
                <tr>
                    <td class="text">
                        Job Title
                    </td>
                    <td>
                        <input type="text" name="jobTitle" class="input" tabindex="1" required="required" />
                    </td>
                </tr>
                <tr>
                    <td class="text">
                        Job Description
                    </td>
                    <td>
                        <textarea name="jobDescription" class="input" tabindex="2" required="required"></textarea>
                    </td>
                </tr>
                <tr>
                    <td class="text">
                        For Property
                    </td>
                    <td>
                        <select id="propertyTitle" name="propertyId" class="input" tabindex="3" style="width:100%">
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="text">
                        Extra Notes
                    </td>
                    <td>
                        <textarea name="jobNote" class="input" tabindex="4"></textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="reset" class="button" tabindex="6" value="Reset" style="width: 120px;" />
                        <input type="submit" class="button" tabindex="5" value="Add Job" style="width: 120px;" />
                    </td>
                </tr>
            </table>
        </form>
		<br/>
    </body>
</html>
<?php
	}else{
		header('Location:LoginAdmin.php');
	}
?>