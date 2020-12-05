<?php
	session_start();
	if(isset($_SESSION['user'])){
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">        
        <link rel="stylesheet" type="text/css" href="../style/style.css">
        <script type="text/javascript" src="../JS/UpdateJob.js"></script>
	    <script type="text/javascript" src="../JS/GetProperties.js" ></script>
        <style>
            h2 {
                text-align: center;
                color: #4682B4;
            }
            table {
                width:50%;
            }
            #col1 {
                width:35%;
            }
            #col2 {
                width: 65%;
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
	        <a href="RentalPropertiesAdmin.php"> HOME</a>
            <a href="BuyProprtiesAdmin.php">BUY A HOUSE</a>
            <a href="JobsAdmin.php">JOB</a>
            <a href="../php/AdminLogout.php?logout" style="float: right;">LOGOUT</a>
	    </div>
        
        <h2>Update Repair Job</h2>
        <hr style="width:98%"/>
        <form method = "POST" action = "../php/UpdateJob.php">
            <input type = "hidden" id = "jobId" name = "jobId">
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
                        <input type="text" name="jobTitle" id="jobTitle" class="input" tabindex="1" required="required" />
                    </td>
                </tr>
                <tr>
                    <td class="text">
                        Job Description
                    </td>
                    <td>
                        <textarea id="jobDescription" name="jobDescription" class="input" tabindex="2" required="required"></textarea>
                    </td>
                </tr>
                <tr>
                    <td class="text">
                        For Property
                    </td>
                    <td>
                        <select id="propertyTitle" name="propertyTitle" class="input" tabindex="3" ></select>
                        <script>getProperties()</script>
                    </td>
                </tr>
                <tr>
                    <td class="text">
                        Extra Notes
                    </td>
                    <td>
                        <textarea name="jobNote" id="jobNote" class="input" tabindex="4"></textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" class="button" tabindex="5" value="Update" style="width: 120px;margin-top:2%" />
                    </td>
                </tr>
            </table>
        </form>
        <script>getJob(<?php echo $_GET['ID']; ?>);</script>
    </body>
</html>
<?php
	}else{
		header('Location:LoginAdmin.php');
	}
?>