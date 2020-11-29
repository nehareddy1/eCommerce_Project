function getPropertyTypes()
{
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() 
    {
        if (this.readyState == 4 && this.status == 200) 
        {
            var types = JSON.parse(this.responseText);
            types.forEach(propertyTypes);
           
            function propertyTypes(type)
            {
               var type_id = type['TypeId'];
               var type_name = type['TypeName'];

               option = document.createElement("option");
                   option.id = type_id;
                   option.value = type_id;
                   option.innerHTML = type_name;
               document.getElementById("propertyType").appendChild(option);  
            }
        }
    };
    xmlhttp.open("GET", "../php/GetPropertyTypes.php", true);
    xmlhttp.send();
}

function GetCityState()
{
	var code = document.getElementById("propertyZip").value;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("POST", '../php/GetCityState.php', true);
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xmlhttp.onreadystatechange = function() 
    {
        if (this.readyState == 4 && this.status == 200) 
        {
            var response = JSON.parse(this.responseText);
			document.getElementById("zipID").value = response["Zip"];
            document.getElementById("propertyCity").value = response["City"];
            document.getElementById("propertyState").value = response["State"];
        }
    };
    xmlhttp.send('zip_code=' + code);
}

function isNumberKey(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode;

    if ((charCode < 48 || charCode > 57))
        return false;
        
    return true;
}

function isNumberWithDecimal(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode;

    if ( charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
        
    return true;
}