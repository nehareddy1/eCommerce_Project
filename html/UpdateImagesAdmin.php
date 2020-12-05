<?php
	session_start();
	if(isset($_SESSION['user'])){
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../style/style.css">    
	    <script type="text/javascript" src="../JS/PropertyImages.js" ></script>
        <style>
            h2 {
                text-align: center;
                color: #4682B4;
            }
            #col1{
                width:80%;
            }
            #col2{
                width:20%;
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
                <a href=".html">BUY A HOUSE</a>
                <a href="JobsAdmin.php">JOBS</a>
                <a href="../php/AdminLogout.php?logout" style="float: right;">LOGOUT</a>
	        </div>

        <div>
            <h2>Update Property Images</h3>
	        <hr style="width: 98%"/>
	        <form method = "POST" action = "../php/InsertNewImages.php" enctype="multipart/form-data">
                <table align="center" width="30%" id = "imagesTable">
                    <colgroup>
                        <col id="col1">
                        <col id="col1">
                    </colgroup>
                    <tr>
                        <td>
                            <input type="file" name="files[]" multiple>
                        </td>
                        <td>
                            <input type="hidden" id="propertyId" name="Id" value=""/>
                            <input type="submit" class="button" value="Add New"/>
                        </td>
                    </tr>
                 </table>
            </form>
        </div>
        <br/>
        <script>getPropertyImages(<?php echo $_GET['ID'] ?>);</script>
    </body>
</html>
<?php
	}else{
		header('Location:LoginAdmin.php');
	}
?>