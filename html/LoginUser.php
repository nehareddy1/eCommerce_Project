<!DOCTYPE html>
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
            <a href="HomeUser.html"> HOME</a>
            <a href="RentalPropertiesUser.html">RENTAL HOUSE</a>
            <a href="JobsUser.html">JOBS</a>
            <a href="LoginUser.html">LOGIN/SIGNUP</a>
        </div>

        <form method="post" action="../php/UserLogin.php">
		<?php
		
								if (!isset($_COOKIE["Error"]))
									print "";
								else
									print "<p style='Text-align:Center; color:red;'>Email and password combination didn't work!</p>";
									
								setcookie('Error', 'has_error');
								
								?>
            <table width="30%" align="center">
                <tr>
                    <th class="contactBack">Login</th>
                </tr>
                <tr>
                    <td class="contactInfoBack">
                        <table width="100%">
                            <tr>
                                <td><input type="text" id="userId" name="userId" class="input" tabindex="1" placeholder="Email" style="text-align: center"></td>
                            </tr>
                            <tr>
                                <td>
                                    <hr width="90%" />
                                </td>
                            </tr>
                            <tr>
                                <td><input type="password" id="password" name="password" class="input" tabindex="2" placeholder="Password" style="text-align: center"></td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="submit" id="login" class="button" tabindex="3" value="Login" />
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </form>

        <hr width="90%" />

        <form method="post" action="../php/UserSignup.php">
		<?php
		
								if (!isset($_COOKIE["Error"]))
									print "";
								else
									print "<p style='Text-align:Center; color:red;'>Error in format of details provided or Mandatory fields are not filled below!</p>";
									
								setcookie('Error', 'has_error');
								
								?>
            <table width="30%" align="center">
                <tr>
                    <th class="contactBack">Sign Up</th>
                </tr>
                <tr>
                    <td class="contactInfoBack">
                        <table width="100%">
                            <tr>
                                <td>
                                    <input type="text" id="fir" name="fir" class="input" tabindex="2" placeholder="First Name" style="text-align: center" onmousemove="first()" onmouseout="firstOut()" onfocus="firstFocus()" onchange="idPassPhoneChange()" onblur="firstBlur()"><label id="fier"></label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" id="las" name="las" class="input" tabindex="2" placeholder="Last Name" style="text-align: center" onmousemove="last()" onmouseout="lastOut()" onfocus="lastFocus()" onchange="idPassPhoneChange()" onblur="lastBlur()"><label id="laer"></label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" id="ph" name="ph" class="input" tabindex="2" placeholder="Phone Number" style="text-align: center" onmousemove="phone()" onmouseout="phoneOut()" onfocus="phoneFocus()" onchange="idPassPhoneChange()" onblur="phoneBlur()"><label id="pher"></label>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="text" id="add1" name="add" class="input" tabindex="2" placeholder="Address" style="text-align: center" onmousemove="addr()" onmouseout="adOut()"><label id="ader"></label></td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" id="userId1" name="userId" class="input" tabindex="1" placeholder="Email" style="text-align: center" onmousemove="email()" onmouseout="eOut()" onfocus="eFocus()" onchange="idPassPhoneChange()" onblur="eBlur()"><label id="emer"></label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="password" id="password1" name="password" class="input" tabindex="2" placeholder="Password" style="text-align: center" onmousemove="pass()" onmouseout="passOut()" onfocus="passFocus()" onchange="idPassPhoneChange()" onblur="passBlur()"><label id="per">
                                </td>
                            </tr>
							<tr>
							<td>
							
							</td>
							</tr>
                            <tr>
                                <td>
                                    <input type="submit" id="login1" class="button" tabindex="3" value="Signup" />
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