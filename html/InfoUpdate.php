<?php
	session_start();
	if(isset($_SESSION['user2'])){
?>
<!DOCTYPE html>

<html>
    <head>
        <title>Real Estate</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../style/style.css">
		<script type="text/javascript" src="../JS/LoginUser.js"></script>
        <style>
            form{
                margin-top:2%;
            }  
            td{
                padding:2%;
            }
        </style>
    </head>

    <body>
        <header>
            <div class="header">
                <a class="active" href="InfoUpdate.php"><img src="../images/logo.png" class="logo"></a>
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

        <form method="get" action="../php/UserInfoUpdate.php">
		
            <table width="30%" align="center">
                <tr>
                    <th class="contactBack">Profile Info</th>
                </tr>
                <tr>
                    <td class="contactInfoBack">
                        <table width="100%">
                            <tr>
                                <td>
                                   <?php echo '<input type="text" id="fir" name="fir" class="input" tabindex="2" placeholder="First Name" style="text-align: center" onmousemove="first()" onmouseout="firstOut()" onfocus="firstFocus()" onchange="idPassPhoneChange()" onblur="firstBlur()" value="'.$_SESSION['fn'].'"></input>'?><label id="fier"></label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                   <?php echo '<input type="text" id="las" name="las" class="input" tabindex="2" placeholder="Last Name" style="text-align: center" onmousemove="last()" onmouseout="lastOut()" onfocus="lastFocus()" onchange="idPassPhoneChange()" onblur="lastBlur()" value="'.$_SESSION['ln'].'"></input>'?><label id="laer"></label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <?php echo '<input type="text" id="ph" name="ph" class="input" tabindex="2" placeholder="Phone Number" style="text-align: center" onmousemove="phone()" onmouseout="phoneOut()" onfocus="phoneFocus()" onchange="idPassPhoneChange()" onblur="phoneBlur()" value="'.$_SESSION['ph'].'"></input>'?><label id="pher"></label>
                                </td>
                            </tr>
                            <tr>
							<td>
                                 <?php echo '<input type="text" id="add1" name="add" class="input" tabindex="2" placeholder="Address" style="text-align: center" onmousemove="addr()" onmouseout="adOut()" value="'.$_SESSION['adr'].'"></input>'?><label id="ader"></label></td>
                            </tr>
                            <tr>
                                <td>
                                     <?php echo '<input type="text" id="userId1" name="userId" class="input" tabindex="1" placeholder="Email" style="text-align: center" onmousemove="email()" onmouseout="eOut()" onfocus="eFocus()" onchange="idPassPhoneChange()" onblur="eBlur()" value="'.$_SESSION['em'].'"></input>'?><label id="emer"></label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <?php echo '<input type="password" id="password1" name="password" class="input" tabindex="2" placeholder="Password" style="text-align: center" onmousemove="pass()" onmouseout="passOut()" onfocus="passFocus()" onchange="idPassPhoneChange()" onblur="passBlur()" value="'.$_SESSION['pw'].'"></input>'?><label id="per">
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:center">
                                    <input type="submit" class="button" tabindex="3" value="Update" />
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>	
        </form>
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