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
        <script type="text/javascript" src="../JS/GetPropertyTypes.js" charset="utf-8"></script>
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
                <a class="active" href="PayInfoUser.php"><img src="../images/logo.png" class="logo"></a>
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

        <form method="get" action="../php/PayUserInfo.php">
		
            <table width="30%" align="center">
                <tr>
                    <th class="contactBack">Bank Account Info</th>
                </tr>
                <tr>
                    <td class="contactInfoBack">
                        <table width="100%">
                            <tr>
                                <td>
                                    <?php echo '<input type="text" id="name" name="name" class="input" tabindex="1" placeholder="Name on the Acoount" style="text-align: center" 
									value="'.$_SESSION['nmpay'].'"></input>'?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <?php echo '<input type="text" id="account" name="account" class="input" tabindex="2" placeholder="Account Number" style="text-align: center" onkeypress="return isNumberKey(event)" 
									value="'.$_SESSION['acnum'].'"></input>'?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <?php echo '<input type="text" id="email" name="email" class="input" tabindex="3" placeholder="Email" style="text-align: center" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2, 4}$"
									value="'.$_SESSION['empay'].'"></input>'?>
                                </td>
                            </tr>
                            <tr>
                                <td>
								<?php echo '<input type="text" id="phone" name="phone" class="input" tabindex="4" placeholder="Phone Number" style="text-align: center" onkeypress="return isNumberKey(event)"
								value="'.$_SESSION['phpay'].'"></input>'?>
								</td>
                            </tr>
                            <tr>
                                <td style="text-align:center">
                                    <input type="submit" class="button" tabindex="5" value="Update" />
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