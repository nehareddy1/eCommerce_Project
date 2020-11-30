<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../style/style.css">
        <script type="text/javascript" src="../JS/UpdateRentalProperty.js"></script>
	    <script type="text/javascript" src="../JS/GetPropertyTypes.js" ></script>
        <style>
        #col1 {
            width: 15%;
        }

        #col2 {
            width: 30%;
        }

        #col3 {
            width: 2%;
        }

        #col4 {
            width: 15%;
        }

        #col5 {
            width: 30%;
        }

        h2 {
            text-align: center;
            color: #4682B4;
        }
    </style>
    </head>

    <body>
        <header>
	        <div class="header">
		        <a class="active" href="RentalPropertiesAdmin.html"><img src="../images/logo.png" class="logo"></a>
		        <h1 class="headerText">Real Estate</h1>
		    </div>
        </header>

	        <div id="navbar" class="sticky">
	            <a href="RentalPropertiesAdmin.html">RENTAL</a>
                <a href=".html">BUY A HOUSE</a>
		        <a href="JobsAdmin.html">JOBS</a>
	        </div>

        <div>
            <h2>Update Rental Property</h2>
	        <form method = "POST" action = "../php/UpdateProperty.php">
	            <input type = "hidden" id = "propertyId" name = "propertyId">
                <table align="center" width="97%">
                    <colgroup>
                        <col id="col1">
                        <col id="col2">
                        <col id="col3">
                        <col id="col4">
                        <col id="col5">
                    </colgroup>
                    <tr>
                        <th colspan="3" style="padding-bottom: 10px;color:#26C756;">General Information</th>
                        <th colspan="2" style="padding-bottom: 10px;color:#26C756;">Property Amenities</th>
                    </tr>
                    <tr>
                        <td colspan="5"><hr style="width: 100%" /></td>
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
                        <td style="padding-top: 20px;">
                            <input type="text" id="propertySqrFt" name="propertySqrFt" class="input" tabindex="10" required="required">
                        </td>
                    </tr>
                    <tr>
                        <td class="text">
                            Property Type
                        </td>
                        <td><select name="propertyType" id="propertyType" class="input" tabindex="2" required="required"></select>  
			                <script>getPropertyTypes()</script>			
                        </td>
                        <td></td>
                        <td class="text">
                            Total Bed
                        </td>
                        <td>
                            <input type="number" list="bed" id="propertyBed" name="propertyBed" class="input" tabindex="11" required="required"  onkeypress="return isNumberKey(event)">
                        </td>
                    </tr>
                    <tr>
                        <td class="text">
                            Street Address 1
                        </td>
                        <td>
                            <input type="text" id="propertyAddress1" name="propertyAddress1" class="input" tabindex="3" required="required">
                        </td> 
                        <td></td>
                        <td class="text">
                            Total Bath
                        </td>
                        <td>
                            <input type="number" list="bath" id="propertyBath" name="propertyBath" class="input" min="1" tabindex="12" required="required" onkeypress="return isNumberWithDecimal(event)">
                        </td>
                    </tr>
                    <tr>
                        <td class="text">
                            Street Address 2
                        </td>
                        <td>
                            <input type="text" id="propertyAddress2" name="propertyAddress2" class="input" tabindex="4">
                        </td>  
                        <td></td>
                        <td class="text">
                            Parking
                        </td>
                        <td>
                            <input type="text" list="parking" id="propertyParking" name="propertyParking" class="input" tabindex="13" required="required">
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
                        <td>
                            <input type="text" id="propertyZip"  class="input" tabindex="8" required="required" maxlength="5" onchange= "GetCityState();">
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
                        <td>
                            <input type="text" id="propertyCity" name="propertyCity" class="input" tabindex="5" disabled>
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
                        <td>
                            <input type="text" id="propertyState" class="input" tabindex="6" disabled>
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
                        <td>
                            <input type="text" id="propertyCountry" class="input" value="USA" tabindex="7" disabled>
                        </td>
                        <td></td>
                        <td class="text" valign="top" rowspan= '2'>
                            Note:
                        </td>
                        <td rowspan= '2'>
                            <textarea rows="5" class="input" style="resize: none;overflow-y: auto;" tabindex="22" id="propertyNote" name="propertyNote"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td class="text" valign="top">
                            Price (/Month) $
                        </td>
                        <td valign="top">
                            <input type="text" id="propertyPrice" name="propertyPrice" class="input" tabindex="9" required="required" onkeypress="return isNumberWithDecimal(event)">
                        </td>
                        <td></td>
                    </tr>
                        <td colspan="5" align="center">
                            <button type="button" id="cancel" class="button" style="width: 120px;" tabindex="24" onClick="location.href='RentalPropertiesAdmin.html'">Cancel</button>
                            <button type="submit" id="update" class="button" style="width: 120px;" tabindex="23">Update</button>
                        </td>
                   </tr>
                 </table>
            </form>
        </div>
            <br/>
            <script>getProperty(<?php echo $_GET['ID']; ?>); 
            </script>
    </body>
</html>
