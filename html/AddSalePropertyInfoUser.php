<?php
	session_start();
	if(isset($_SESSION['user2'])){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../style/style.css">
    <script type="text/javascript" src="../JS/GetPropertyTypes.js" charset="utf-8"></script>
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

<body onload = "getPropertyTypes();">

    <header>
	    <div class="header">
		    <a class="active" href="AddSalePropertyInfoUser.php"><img src="../images/logo.png" class="logo"></a>
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

    <div>
        <h2>Add New Property To Sell</h2>
        <form method = "POST" action = "../php/InsertPropertyBuy.php" enctype = "multipart/form-data">
            <table align="center" width="97%" >
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
                    <td colspan="5"><hr style="width: 100%"/></td>
                </tr>

                <tr>
                    <td class="text" style="padding-top: 20px;">
                        Property Title
                    </td>
                    <td style="padding-top: 20px;">
                        <input type="text" name="propertyTitle" class="input" tabindex="1" required="required">
                    </td>
                    <td style="padding-top: 20px;"></td>
                    <td class="text" style="padding-top: 20px;">
                        Total Square Feet
                    </td>
                    <td style="padding-top: 20px;">
                        <input type="text" name="propertySqrFt" class="input" tabindex="10" required="required" onkeypress="return isNumberWithDecimal(event)">
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
                        <input type="number" list="bed" name="propertyBed" class="input" tabindex="11" required onkeypress="return isNumberKey(event)">
                    </td>
                </tr>

                <tr>
                    <td class="text">
                        Street Address 1
                    </td>
                    <td>
                        <input type="text" name="propertyAddress1" class="input" tabindex="3" required="required">
                    </td>
                    <td></td>
                    <td class="text">
                        Total Bath
                    </td>
                    <td>
                        <input type="number" list="bath" name="propertyBath" class="input" tabindex="12" min=1 required onkeypress="return isNumberWithDecimal(event)">
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
                    <td class="text" valign="top" rowspan= '6'>
                        Note:
                    </td>
                    <td rowspan= '6'valign="top">
                        <textarea rows="7" class="input" style="resize: none;overflow-y: auto;" tabindex="22" name="propertyNote"></textarea>
                    </td>
                </tr>

                <tr>
	                <td class="text">
                        Zip
                    </td>
                    <td>
                        <input type="text" id="propertyZip" class="input" tabindex="8" required maxlength="5" onchange="GetCityState();" onkeypress="return isNumberKey(event)" pattern="[0-9]{5}" title="5 Digits">
                        <input type="hidden" id="zipID" name="propertyZip">
		            </td>
                    <td></td>
                </tr>
       
                <tr>
	                <td class="text">
                        City
                    </td>
                    <td>
                        <input type="text" id="propertyCity" class="input" tabindex="5" disabled required>
                    </td>
                    <td></td>
                </tr>

                <tr>
	                <td class="text">
                        State
                    </td>
                    <td>
                        <input type="text" id="propertyState" class="input" tabindex="6" disabled required>
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
                </tr>

                <tr>
                    <td class="text" valign="top">
                        Price (/Month) $
                    </td>
                    <td valign="top">
                        <input type="text" name="propertyPrice" class="input" tabindex="9" required="required" onkeypress="return isNumberWithDecimal(event)">
                    </td>
                    <td></td>
                </tr>
	            
                <tr>
                    <td colspan="5" align="center">
                        <input type="file" name="files[]" multiple>
                    </td>
                </tr>
                
                <tr>
                    <td colspan="5">
                        <br/>
                    </td>
                </tr>

                <tr>
                    <td colspan="5" align="center">
                        <input type="reset" id="clear" class="button" style="width: 120px;" tabindex="25" value="Clear" />
                        <input type="submit" id="setProperty" class="button" style="width: 120px;" tabindex="24" Value="Add" /> 
                    </td>
                </tr>
            </table>
        </form>
    </div>

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