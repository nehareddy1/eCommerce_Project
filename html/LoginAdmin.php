<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../style/style.css">
        <script type="text/javascript" src="../JS/LoginAdmin.js"></script>
    </head>

    <body>
        <header>
	        <div class="header">
		        <a class="active" href="LoginAdmin.html"><img src="../images/logo.png" class="logo"></a>
		        <h1 class="headerText">Real Estate</h1>
		    </div>
        </header>

        <div style=" padding-top: 60px;">
            <?php
                if(@$_GET['Invalid']==true)
                {
            ?>
                <p style="text-align:center"><?php echo $_GET['Invalid'] ?></p>
            <?php
                }
            ?>
            <form method="post" action="../php/AdminLogin.php">
                <table width="30%" align="center">
                    <tr>
                        <th class="contactBack">Login</th>
                    </tr>
                    <tr>
                        <td class="contactInfoBack">
                            <table width="100%">
                                <tr>
                                    <td>
                                        <input type="text" id="userId" name="userId" class="input" tabindex="1" placeholder="Email" 
                                        style="text-align: center" required 
                                        value="<?php echo (@$_GET['User']==true ? htmlspecialchars($_GET['User']) : ''); ?>">
                                        
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <hr style="width: 80%" />
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="password" id="password" name="password" class="input" tabindex="2" placeholder="Password" style="text-align: center" required></td>
                                </tr>
                                <tr>
                                    <td style="text-align:center">
                                        <input type="submit" id="login" class="button" tabindex="3" value="Login" style="margin-top:2%" />
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>
