<?php
	session_start();
	if(isset($_SESSION['user'])){
?>
<!DOCTYPE html>
<html>
<head>
    <title>Real Estate</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../style/style.css">
    <script type="text/javascript" src="../JS/AllBuyPropertiesUser.js"></script>
    <style>
        #col1 {
            width: 30%;
        }
        #col2 {
            width: 40%;
        }

        #col3 {
            width: 20%;
        }
        #maincol1 {
            width: 75%;
        }
        #maincol2 {
            width: 25%;
        }
        #main{
            margin-top:2%;
            min-height:50vh;
        }
        li {
            list-style-type: none;
            position: relative;
            padding-left: 15px;
            margin:4%;
        }

        li:before {
            content: "\25BA \0020";
            font-size: 10px;
            position: absolute;
            top: 5px;
            left: -10px;
            color:#28C857;
        }

        li>a{
            color:#4682B4;
            text-decoration:none;
        }
    </style>
</head>

<body onload="getBuyPropertiesUser() ">
    <header>
        <div class="header">
            <a class="active" href="HomeUser.php"><img src="../images/logo.png" class="logo"></a>
		    <h1 class="headerText">Real Estate</h1>
        </div>
    </header>

    <div id="navbar" class="sticky">
        <a href="HomeUser.html">HOME</a>
        <a href="RentalPropertiesUser.html">RENTAL HOUSE</a>
        <a href="JobsUser.html">JOBS</a>
	    <a href="HomeUserLogin.php">SELL PROPERTY</a>
        <a href="../php/UserLogout.php?logout" style="float: right;">LOGOUT</a>
    </div>

    <table width ="95%" align ="center" id="main">
        <colgroup>
            <col id="maincol1" />
            <col id="maincol2" />
        </colgroup>
        <tr>
            <td valign="top">
                <table id="propertiesTable" align="center" width="95%">
                    <colgroup>
                        <col id="col1" />
                        <col id="col2" />
                        <col id="col3" />
                    </colgroup>
                </table>
            </td>
            <td valign="top">
                <table width="100%">
                    <tr>
                        <th class="contactBack">Welcome!</th>
                    </tr>
                    <tr>
                        <td class="contactInfoBack">
                            <ul>
                                <li><a href="InfoUpdate.php">Upadte User Propfile</a></li>
                                <li><a href="PayInfoUser.php">Update Account Profile</a></li>
                                <li><a href="AddSalePropertyInfoUser.php">Sell Property</a></li>
                            </ul>    
                        </td>
                    </tr>
                </table>            
            </td>
        </tr>
    </table>
    <br/>
    <footer>
        <div class="footerColumn1">
            <h3>Real Estate Project</h3>
            Specialized in rentals, buying, and repair jobs.
        </div>

        <div class="footerColumn2">
            <h3>Brought to you by students at EMU</h3>
            This website was made by a group of students studying computer science at Eastern Michigan University.
        </div>
        <div></div>
        <p class="footerTextCopy">&copy;2020 Dhwani Neha Pooja</p>
    </footer>
</body>
</html>
<?php
	}else{
		header('Location:LoginUser.php');
	}
?>
