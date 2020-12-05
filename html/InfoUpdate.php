<!DOCTYPE html>
<?php
    session_start();
	?>
<html>
    <head>
        <title>Real Estate</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../style/style.css">
		<script type="text/javascript" src="../JS/LoginUser.js"></script>
        <style>
            table {
                margin-top:3%;
                text-align:center;
            }
            .button {
                margin-top:3%;
            }
			
			ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: lightblue;
}

li {
  float: left;
}

li a, .dropbtn {
  display: inline-block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover, .prof:hover .dropbtn {
  background-color: lightblue;
}

li.prof {
  display: inline-block;
}

.profile {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  
}

.profile a {
  display: block;
  text-align: left;
}


.prof:hover .profile {
  display: block;
}
        </style>
    </head>

    <body>

        <header>
            <div class="header">
                <a class="active" href="HomeUser.html"><img src="../images/logo.png" class="logo"></a>
                <h1 class="headerText">Real Estate</h1>
            </div>
        </header>
        <div id="navbar" class="sticky">
<ul>
  <li><a class="active" href="HomeUserLogin.html"> HOME</a></li>
  <li class="prof">
  <a href="UpdateProfileUser.html" class="dropbtn">UPDATE PROFILE</a>
	<div class="profile">
      <a href="PayInfoUser.html">PayInfo</a>
      <a href="InfoUpdate.html">UserAccountInfo</a>
    </div>
	</li>
  <li><a class="active" href="AddSalePropertyInfoUser.html">SELL PROPERTY</a></li>
  </ul>
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
							<td>
							
							</td>
							</tr>
                            <tr>
                                <td>
                                    <input type="submit" id="login1" class="button" tabindex="3" value="UPDATE" />
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