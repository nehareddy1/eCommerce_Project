<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/angular_material/1.1.12/angular-material.min.css">
    <link rel="stylesheet" type="text/css" href="../style/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.9/angular.min.js"></script>
	<script type="text/javascript" src="../JS/PropertyImages.js" ></script>
</head>

<body class="body">

<header>
	<div class="header">
		<a class="active" href="HomeAdmin.html"><img src="../logo.png" class="logo"></a>
		<h1 class="headerText">Andrew's Dream LLC.</h1>
	</div>
</header>

	<div id="navbar" class="sticky">
	    <a href="HomeAdmin.html"> HOME</a>
        <a class="active" href="RentalAdmin.html">TURNKEY RENTAL</a>
        <a href="AddRentalAdmin.html">ADD NEW PROPERTY</a>
	</div>

<div>
    <h3 style="text-align:center;font-size:40px;" class="text">Update Property Images</h3>
	<form method = "POST" action = "../php/InsertNewImages.php" enctype="multipart/form-data">
        <table align="center" width="50%" id = "imagesTable" border="1">
            <colgroup>
                <col width="50%">
                <col width="50%">
            </colgroup>
            <tr>
                <td>
                    <input type="file" name="files[]" multiple>
                </td>
                <td>
                    <input type="hidden" id="propertyId" name="Id" value=""/>
                    <input type="submit" value="Add New"/>
                </td>
            </tr>
         </table>
    </form>
    <script>getPropertyImages(<?php echo $_GET['ID'] ?>);</script>
</div>
</body>
</html>
