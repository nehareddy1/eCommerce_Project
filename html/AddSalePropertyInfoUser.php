<?php
	session_start();
	if(isset($_SESSION['user'])){
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../style/style.css">
<script type="text/javascript" src="../JS/GetPropertyTypes.js" charset="utf-8"></script>
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

<body class="body" onload = "getPropertyTypes();">

<header>
	<div class="header">
		<a class="active" href="AddSalePropertyInfoUser.php"><img src="../images/logo.png" class="logo"></a>
		<h1 class="headerText">Real Estate</h1>
		</div>
</header>

<div id="navbar" class="sticky">
<ul>
  <li><a class="active" href="HomeUserLogin.php"> HOME</a></li>
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

<div>
    <h3 style="text-align:center;font-size:40px;" class="text">Add New Property To Sell</h3>
    <form method = "POST" action = "../php/InsertPropertyBuy.php" enctype = "multipart/form-data">
    <table align="center" width="97%" >
        <colgroup>
            <col width="15%">
            <col width="30%">
            <col width="2%">
            <col width="15%">
            <col width="30%">
        </colgroup>
      <tr>
        <th colspan="3" style="padding-bottom: 10px;">General Information</th>
        <th colspan="2" style="padding-bottom: 10px;">Property Amenities</th>
      </tr>
      <tr>
        <td colspan="5"><hr style="width: 97%"/></td>
       </tr>
      <tr>
        <td class="text" style="padding-top: 20px;">
            Property Title
        </td>
        <td style="padding-top: 20px;"><input type="text" name="propertyTitle" class="input" tabindex="1" required="required">
        </td>

        <td style="padding-top: 20px;"></td>
        <td class="text" style="padding-top: 20px;">
            Total Square Feet
        </td>
        <td style="padding-top: 20px;"><input type="text" name="propertySqrFt" class="input" tabindex="10" required="required" onkeypress="return isNumberWithDecimal(event)">
        </td>
      </tr>
      <tr>
        <td class="text">
            Property Type
        </td>
        <td>
            <select name="propertyType" id="propertyType" class="input" tabindex="2" required="required" style="width: 100%; border: 2px solid #000000;">
	
			</select>  
        </td>
        <td></td>
        <td class="text">
            Total Bed
        </td>
        <td>
            <input type="text" list="bed" name="propertyBed" class="input" tabindex="11" required="required" onkeypress="return isNumberKey(event)">
                <datalist id="bed">
                    <option value="1">
                    <option value="2">
                    <option value="3">
                    <option value="4">
                    <option value="5">
                </datalist>
        </td>
       </tr>
       <tr>
        <td class="text">
            Street Address 1
        </td>
        <td><input type="text" name="propertyAddress1" class="input" tabindex="3" required="required">
        </td>
        <td></td>
        <td class="text">
            Total Bath
        </td>
        <td>
            <input type="text" list="bath" name="propertyBath" class="input" tabindex="12" required="required" onkeypress="return isNumberWithDecimal(event)">
                <datalist id="bath">
                    <option value="1">
                    <option value="1.5">
                    <option value="2">
                    <option value="2.5">
                    <option value="3">
                </datalist>
        </td>
       </tr>
       <tr>
        <td class="text">
            Street Address 2
        </td>
        <td>
            <input type="text" name="propertyAddress2" class="input" tabindex="4">
        </td>
        <td></td>
       </tr>
       <tr>
	   <td class="text">
            Zip
        </td>
        <td><input type="text" id="propertyZip"  class="input" tabindex="8" required="required" maxlength="5" onchange= "GetCityState();">
        <input type = "hidden" id = "zipID" name="propertyZip">
		</td>
        
        <td></td>
       </tr>
       <tr>
	   <td class="text">
            City
        </td>
        <td><input type="text" id="propertyCity" class="input" tabindex="5" required="required">
        </td>
        
        <td></td>
       </tr>
       <tr>
	   <td class="text">
            State
        </td>
        <td><input type="text" id="propertyState" class="input" tabindex="6" required="required">
        </td>
        
       </tr>
       <tr>
        <td class="text">
            Country
        </td>
        <td><input type="text" id="propertyCountry" class="input" value="USA" tabindex="7" required="required">
        </td>
        <td></td>
        <td class="text" valign="top" rowspan= '2'>
            Note:
        </td>
        <td rowspan= '2'><textarea rows="5" class="input" style="resize: none;overflow-y: auto;" tabindex="22" name="propertyNote"></textarea>
        </td>
       </tr>
       <tr>
        <td class="text" valign="top">
            Price (/Month) $
        </td>
        <td valign="top"><input type="text" name="propertyPrice" class="input" tabindex="9" required="required" onkeypress="return isNumberWithDecimal(event)">
        </td>
        <td></td>
        
       </tr>
	    <tr>
            <td colspan="5" align="center">
                <input type="file" name="files[]" multiple>
            </td>
        </tr>
       <tr>
            <td colspan="5" align="center">
                <output id="list"></output>
                <br/><output id="deletelist"></output>
            </td>
       </tr>
       <tr>
        <td colspan="5" align="center">
            <button type="reset" id="clear" class="button" style="width: 120px;" tabindex="25">Clear</button>
            <button type="submit" id="setProperty" class="button" style="width: 120px;" tabindex="24" >Add</button>
        </td>
       </tr>
     </table>
     </form>
     <br/>
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
<?php
	}else{
		header('Location:LoginUser.php');
	}
?>