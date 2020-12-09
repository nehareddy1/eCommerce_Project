<?php
	session_start();
	if(isset($_SESSION['user2'])){
?>
<!DOCTYPE html>
<html>
<head>
<title>Real Estate</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/angular_material/1.1.12/angular-material.min.css">
<link rel="stylesheet" type="text/css" href="../style/style.css">
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.9/angular.min.js"></script>
<script type="text/javascript" src="../javascript/home.js" charset="utf-8"></script>
<style>
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

<body class="body">
<header>
    <div class="header">
        <a class="active" href="UpdateProfileUser.php"><img src="../images/logo.png" class="logo"></a>
		<h1 class="headerText">Real Estate</h1>
    </div>
</header>

<div id="navbar" class="sticky">
<ul>
  <li><a class="active" href="HomeUserLogin.html"> HOME</a></li>
  <li class="prof">
  <a href="UpdateProfileUser.php" class="dropbtn">UPDATE PROFILE</a>
	<div class="profile">
      <a href="PayInfoUser.php">PayInfo</a>
      <a href="InfoUpdate.php">UserAccountInfo</a>
    </div>
	</li>
  <li><a class="active" href="AddSalePropertyInfoUser.php">SELL PROPERTY</a></li>
  <li><a href="../php/UserLogout.php?logout" style="float: right;">LOGOUT</a></li>
  </ul>
</div>

<table id="t02" width ="90%" align ="center">
    <col width="60%"/>
    <col width="10%"/>
    <col width="30%"/>
        <tr>
            <th colspan="3" align="left">
                <h2 style="font-size:40px;color:Black;padding:0px;" class="text">Here you can sell, rent and find repair jobs</h2>
            </th>
        </tr>
        <tr>
            <td valign="top">
                <p class="text" id="homeDescription" style="padding:0px;">Hello, How are you today! Welcome to our website
                </p>
            </td>
            <td></td>
            <td>
                <table width="100%">
                    <tr>
                        <th class="contactBack">Contact US</th>
                    </tr>
                    <tr>
                        <td class="contactInfoBack">
                            Address: <p id="add" class="title" style="font-size:20px;">address</p>
                            <br/><br/>
                            Phone: <p id="contact" class="title" style="font-size:20px;">phone number</p>
                            <br/><br/>
                            Email: <p id="email" class="title" style="font-size:20px;">email</p>
                            <br/><br/>
                        </td>
                    </tr>
                </table>            
            </td>
        </tr>
        <tr>
            <td>
                <div id="homeVideo">    
                </div>
            </td>
            <td></td>
            <td></td>
        </tr>
    </table>
    <br/>
    <footer>
    	<div class="footerColumn1">
            <h2>Real Estate</h2>
             Specialized in rentals, buying, and repair jobs.
    	</div>
    
    	<div class="footerColumn2">
            <h2>Brought to you by students at EMU</h2>
                This website was made by a group of students studying computer science at Eastern Michigan University. 
    	</div>

        <div class="footerTextCopy">©2020 Dhwani Neha Pooja </div>
    </footer>

<script>loadHomePage()</script>
</body>
</html>
<?php
	}else{
		header('Location:LoginUser.php');
	}
?>