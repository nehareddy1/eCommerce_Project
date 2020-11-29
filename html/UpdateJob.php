<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/angular_material/1.1.12/angular-material.min.css">
        <link rel="stylesheet" type="text/css" href="../style/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.9/angular.min.js"></script>
        <script type="text/javascript" src="../JS/UpdateJob.js"></script>
	    <script type="text/javascript" src="../JS/GetProperties.js" ></script>
        <style>
            h3 {
                text-align:center;
            }
            table {
                width:50%;
            }
            hr {
                margin:2%;
            }
            #col1 {
                width:30%;
            }
            #col2 {
                width: 70%;
            }
        </style>
    </head>

    <body class="body">

        <header>
	        <div class="header">
		        <a class="active" href="Home.html"><img src="../images/logo.png" class="logo"></a>
		        <h1 class="headerText">Real Estate</h1>
		    </div>
        </header>

	    <div id="navbar" class="sticky">
	        <a href="HomeAdmin.html"> HOME</a>
            <a class="active" href="RentalAdmin.html">TURNKEY RENTAL</a>
            <a href="AddRentalAdmin.html">ADD NEW PROPERTY</a>
	    </div>
        
        <h3 class="text">Update Repair Job</h3>
        <form method = "POST" action = "../php/UpdateJob.php">
            <input type = "hidden" id = "jobId" name = "jobId">
            <table align="center">
                <colgroup>
                    <col id="col1">
                    <col id="col2">
                </colgroup>
                <tr>
                    <th colspan="2">JOB Information</th>
                </tr>
                <tr>
                    <td colspan="2"><hr/></td>
                </tr>
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
                        <select id="propertyTitle" name="propertyTitle" class="input" tabindex="3"></select>
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
                        <input type="submit" class="button" tabindex="5" value="Update" />
                    </td>
                </tr>
            </table>
        </form>
        <script>getJob(<?php echo $_GET['ID']; ?>);</script>
    </body>
</html>
