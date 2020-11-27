<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../style/style.css">    
	<script type="text/javascript" src="../JS/PropertyImages.js" ></script>
</head>

<body class="body">

<header>
	<div class="header">
		<a class="active" href="Home.html"><img src="../images/logo.png" class="logo"></a>
		<h1 class="headerText">Real Estate</h1>
		</div>
</header>

	<div id="navbar" class="sticky">
	    <a href=".html"> RENTAL</a>
        <a class="active" href="RentalAdmin.html">BUY</a>
        <a href="AddRentalAdmin.html">Jobs</a>
	</div>

<div>
    <h3 style="text-align:center;font-size:40px;" class="text">Update Property Images</h3>
	<hr style="width: 97%"/>
	<form method = "POST" action = "../php/InsertNewImages.php" enctype="multipart/form-data">
        <table align="center" width="50%" id = "imagesTable">
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
                    <input type="submit" class="button" value="Add New" style = width: 100px;margin-top: 0px;margin-right: 5px;/>
                </td>
            </tr>
         </table>
    </form>
    <script>getPropertyImages(<?php echo $_GET['ID'] ?>);</script>
</div>
<footer>
	<div class="footerColumn1">
        <h2>Real Estate Project</h2>
        Specialized in rentals, buying, and repair jobs.
	</div>

	<div class="footerColumn2">
        <h2>Brought to you by students at EMU</h2>
         This website was made by a group of students studying computer science at Eastern Michigan University.</div>

    <div class="footerTextCopy">©2020 Dhwani Neha Pooja </div>
</footer>
</body>
</html>
