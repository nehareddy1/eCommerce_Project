<?php
	session_start();
	if(isset($_SESSION['user'])){
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">        
        <link rel="stylesheet" type="text/css" href="../style/style.css">
        <script type="text/javascript" src="../JS/GetJobContacts.js"></script>
        <style>
            h2,h4 {
                text-align: center;
                color: #4682B4;
            }
            table {
                width:50%;
            }
            tr:hover{
                background-color:#4682B4;
            }
            th{
                padding:1%;
                text-align:left;
                background-color:#4682B4;
                color:#26C756;
            }
            td{
                padding:1%;
            }
            #col1 {
                width:20%;
            }
            #col2 {
                width: 60%;
            }
            #col3 {
                width: 60%;
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
        
        <h2>View Repair Job Contacts</h2>
        <h4>Job Title: <?php echo $_GET['TITLE'];?></h4>
        <hr style="width:98%"/>

        <table align="center" id="contactsTable">
            <colgroup>
                <col id="col1"/>
                <col id="col2"/>
                <col id="col3"/>
            </colgroup>
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Phone</th>
            </tr>
        </table>
        <p id="nodata" style="text-align: center;"></p>
        <script>getContacts(<?php echo $_GET['ID']; ?>);</script>
    </body>
</html>
<?php
	}else{
		header('Location:LoginAdmin.php');
	}
?>