<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../style/style.css">
    <script type="text/javascript" src="../JS/UpdateRentalProperty.js"></script>
	<script type="text/javascript" src="../JS/GetPropertyTypes.js" ></script>
</head>

<body class="body">

<header>
	<div class="header">
		<a class="active" href="Home.html"><img src="../images/logo.png" class="logo"></a>
		<h1 class="headerText">Real Estate</h1>
		</div>
</header>

	<div id="navbar" class="sticky">
	    <a href=".html">RENTAL</a>
        <a class="active" href="RentalAdmin.html">BUY</a>
		<a href=".html">Jobs</a>
        <a href="AddRentalAdmin.html">ADD NEW PROPERTY</a>
	</div>

<div>
    <h3 style="text-align:center;font-size:40px;" class="text">Update Rental Property</h3>
	<form method = "POST" action = "../php/UpdateProperty.php">
	<input type = "hidden" id = "propertyId" name = "propertyId">
    <table align="center" width="97%" >
      <col width="15%">
      <col width="30%">
      <col width="2%">
      <col width="15%">
      <col width="30%">
      <tr>
        <th colspan="3" style="padding-bottom: 10px;">General Information</th>
        <th colspan="2" style="padding-bottom: 10px;">Property Amenities</th>
      </tr>
      <tr>
        <td colspan="5"><hr class="line" style="width: 97%"/></td>
       </tr>
      <tr>
        <td style="padding-top: 20px;">
            <p class="title" id="propertyTitle" style="padding-left: 15px;"></p>
        </td style="padding-top: 20px;">
        <td>
            <div>
				<label for="propertyAvailable">Available</label>
                <input id="propertyAvailable" name="propertyAvailable"  type="checkbox" value="1"/>
            </div>
        </td>
        <td style="padding-top: 20px;"></td>
        <td class="text" style="padding-top: 20px;">
            Total Square Feet
        </td>
        <td style="padding-top: 20px;"><input type="text" id="propertySqrFt" name="propertySqrFt" class="input" tabindex="10" required="required">
        </td>
      </tr>
      <tr>
        <td class="text">
            Property Type
        </td>
        <td><select name="propertyType" id="propertyType" name="propertyType" class="input" tabindex="2" required="required">
	
			</select>  
			<script>getPropertyTypes()</script>			
        </td>
        <td></td>
        <td class="text">
            Total Bed
        </td>
        <td><input type="text" list="bed" id="propertyBed" name="propertyBed" class="input" tabindex="11" required="required"  onkeypress="return isNumberKey(event)">
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
        <td><input type="text" id="propertyAddress1" name="propertyAddress1" class="input" tabindex="3" required="required">
        </td> 
        <td></td>
        <td class="text">
            Total Bath
        </td>
        <td>
            <input type="text" list="bath" id="propertyBath" name="propertyBath" class="input" tabindex="12" required="required" onkeypress="return isNumberWithDecimal(event)">
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
        <td><input type="text" id="propertyAddress2" name="propertyAddress2" class="input" tabindex="4">
        </td>  
        <td></td>
        <td class="text">
            Parking
        </td>
        <td><input type="text" list="parking" id="propertyParking" name="propertyParking" class="input" tabindex="13" required="required">
                <datalist id="parking">
                    <option value="Open">
                    <option value="Street">
                    <option value="Garage">
                    <option value="Carport">
                </datalist>
        </td>
       </tr>
       <tr>
	   <td class="text">
            Zip
        </td>
        <td><input type="text" id="propertyZip"  class="input" tabindex="8" required="required" maxlength="5" onchange= "GetCityState();">
        <input type = "hidden" id = "zipID" name = "zipID">
		</td>
        
        <td></td>
        <td class="text">
            Pet Friendly?
        </td>
        <td>
            <label class="text" style="padding:0px;"><input type="radio" id = "petYes" name="propertyPet" value="1" tabindex="16" checked="checked">
            YES</label>
            <label class="text"><input type="radio" id = "petNo" name="propertyPet" value="0" tabindex="17">
            No</label>
        </td>
       </tr>
       <tr>
	   <td class="text">
            City
        </td>
        <td><input type="text" id="propertyCity" name="propertyCity" class="input" tabindex="5" required="required">
        </td>
        
        <td></td>
        <td class="text">
            Lease Period
        </td>
        <td>
		<input type="text" id="propertyMinLease" name="propertyMinLease" class="input" style="width:44%;" tabindex="20" placeholder="Min"/>
		 
        </td>
       </tr>
       <tr>
	   <td class="text">
            State
        </td>
        <td><input type="text" id="propertyState" class="input" tabindex="6" required="required">
        </td>
        
        <td></td><td></td>
		<td>
		<input type="text" id="propertyMaxLease" name="propertyMaxLease" class="input" style="width:44%;" tabindex="21" placeholder="Max"/>
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
        <td rowspan= '2'><textarea rows="5" class="input" style="resize: none;overflow-y: auto;" tabindex="22" id="propertyNote" name="propertyNote"></textarea>
        </td>
       </tr>
       <tr>
        <td class="text" valign="top">
            Price (/Month) $
        </td>
        <td valign="top"><input type="text" id="propertyPrice" name="propertyPrice" class="input" tabindex="9" required="required" onkeypress="return isNumberWithDecimal(event)">
        </td>
        <td></td>
        
       </tr>
        <td colspan="5" align="center">
            <button type="button" id="cancel" class="button" style="width: 120px;" tabindex="24" onClick="location.href='RentalAdmin.html'">Cancel</button>
            <button type="submit" id="update" class="button" style="width: 120px;" tabindex="23">Update</button>
        </td>
       </tr>
     </table>
    <br/>
</form>
</div>
<script> 
        

        getProperty(<?php echo $_GET['ID']; ?>); 
</script>
</body>
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
</html>
