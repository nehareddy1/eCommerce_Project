function getBuyPropertiesUser() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {

        if (this.readyState == 4 && this.status == 200) {

            var properties = JSON.parse(this.responseText);
            properties.forEach(createProperty);
            
            function createProperty(property) {
                var property_key = property['ID'];
                var property_name = property['NAME'];
                var property_address1 = property['ADDRESS1'];
			    var property_address2 = property['ADDRESS2'];
			    var zip_code = property['ZIPCODE'];
			    var city = property['CITY'];
			    var state = property['STATE'];
			    var property_sqr_feet = property['SQUARE_FEET'];
                var property_bed = property['BED'];
                var property_bath = property['BATH'];
                if(property['IMAGE'] === null){
                    var img = "default.png"; 
                }else{
                    var img = property['IMAGE'];
                }

                tr_tag = document.createElement("tr");

                img_td_tag = document.createElement("td");
                img_tag = document.createElement("img");
                img_tag.src = "..\\PropertyImages\\"+img;
                img_tag.width = "300";
                img_tag.height = "150";
                img_tag.align = "center";
                img_tag.onclick = function (){/*add update image page like AllRentalPropertiesAdmin*/};
                img_td_tag.appendChild(img_tag); 
                tr_tag.appendChild(img_td_tag);

                title_td_tag = document.createElement("td");
                title_p_tag = document.createElement("p");
			    title_p_tag.style.color = "#4682B4";
                title_p_tag.class = "title";
                title_p_tag.innerHTML = property_name;
			   
                address_p_tag = document.createElement("p");
                address_p_tag.class = "title";
                address_p_tag.style.fontSize = "25px";
                address_p_tag.innerHTML = property_address1 +", " + property_address2 +",<br> " + zip_code + ", " + city + ", " + state ;
			   
                title_td_tag.appendChild(title_p_tag); 
                title_td_tag.appendChild(address_p_tag); 
                tr_tag.appendChild(title_td_tag); 

                menu_td_tag = document.createElement("td");
                menu_td_tag.align = "center";
                update_button = document.createElement("button");
                update_button.type = "button";
                update_button.id="rentalPropertyUpdate" 
                update_button.className = "button"
                update_button.style="width: 100px;margin-top: 0px;margin-right: 5px;";
                //Make UpdateUserProperty.php and update page name below
                update_button.onclick = function(){document.location.href='UpdateRentalAdmin.php?ID=' +  property_key;};
                update_button.innerHTML = "Update";
                delete_button = document.createElement("button");
                delete_button.type = "button";
                delete_button.id="rentalPropertyUpdate";
                delete_button.onclick = function(){
                    var xmlhttp = new XMLHttpRequest();
                    //Make DeleteUserProperty.phph page and update page name below
                    xmlhttp.open("GET", "../php/DeleteProperty.php?ID=" +  property_key, true);
                    xmlhttp.send();
                    location.reload();
                }; 
                delete_button.className = "button";
                delete_button.style="width: 100px;margin-top: 0px;";
                delete_button.innerHTML = "Delete";
                menu_td_tag.appendChild(update_button); 
                menu_td_tag.appendChild(delete_button); 
                tr_tag.appendChild(menu_td_tag); 

                document.getElementById("propertiesTable").appendChild(tr_tag);  
            }
        }
    };
    xmlhttp.open("GET", "../php/GetBuyPropertiesUser.php", true);
    xmlhttp.send();
}


