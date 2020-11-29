function getProperties()
{
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() 
    {
        if (this.readyState == 4 && this.status == 200) 
        {
            var properties = JSON.parse(this.responseText);
            properties.forEach(propertyTitles);
           
            function propertyTitles(property)
            {
               var property_id = property['ID'];
               var property_name = property['NAME'];

               option = document.createElement("option");
                   option.value = property_id;
                   option.innerHTML = property_name;
               document.getElementById("propertyTitle").appendChild(option);  
            }
        }
    };
    xmlhttp.open("GET", "../php/GetProperties.php", true);
    xmlhttp.send();
}