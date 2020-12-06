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
                <a class="active" href="PayInfoUser.php"><img src="../images/logo.png" class="logo"></a>
                <h1 class="headerText">Real Estate</h1>
            </div>
        </header>
        <div id="navbar" class="sticky">
<ul>
  <li><a class="active" href="HomeUserLogin.php"> HOME</a></li>
  <li class="prof">
  <a href="UpdateProfileUser.html" class="dropbtn">UPDATE PROFILE</a>
	<div class="profile">
      <a href="PayInfoUser.php">PayInfo</a>
      <a href="InfoUpdate.php">UserAccountInfo</a>
    </div>
	</li>
  <li><a class="active" href="AddSalePropertyInfoUser.php">SELL PROPERTY</a></li>
  <li><a href="../php/UserLogout.php?logout" style="float: right;">LOGOUT</a></li>
  </ul>
</div>

        <form method="get" action="../php/PayUserInfo.php">
		
            <table width="30%" align="center">
                <tr>
                    <th class="contactBack">Card Info</th>
                </tr>
                <tr>
                    <td class="contactInfoBack">
                        <table width="100%">
                            <tr>
                                <td>
                                    <input type="text" id="fir" name="fir" class="input" tabindex="2" placeholder="Name on the card" style="text-align: center">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" id="las" name="las" class="input" tabindex="2" placeholder="Credit card Number" style="text-align: center">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" id="ph" name="ph" class="input" tabindex="2" placeholder="Expiration date(MM/YY)" style="text-align: center">
                                </td>
                            </tr>
                            <tr>
                                <td><input type="text" id="add1" name="add" class="input" tabindex="2" placeholder="CVV" style="text-align: center">
								</td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" id="zip1" name="zip" class="input" tabindex="1" placeholder="Zip code" style="text-align: center">
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
<?php
	}else{
		header('Location:LoginUser.php');
	}
?>