function getPropertiesUser() {
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
			   var img = property['IMAGE'];
			   var property_sqr_feet = property['SQUARE_FEET'];
               var property_parking = property['PARKING'];
               var property_bed = property['BED'];
               var property_bath = property['BATH'];
               var property_pet = property['PET_FRIENDLY'];
			   var lease_min = property['LEASE_MIN'];
			   var lease_max = property['LEASE_MAX'];


               tr_tag = document.createElement("tr");

               img_td_tag = document.createElement("td");
               img_tag = document.createElement("img");
               img_tag.src = "..\\PropertyImages\\"+img;
               img_tag.width = "300";
               img_tag.height = "150";
               img_tag.align = "center";
               img_tag.onclick = function (){
                    var Images = [];
					var xmlhttp = new XMLHttpRequest();
					xmlhttp.open("POST", '../php/GetPropertyImages.php', true);
					xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

					xmlhttp.onreadystatechange = function() { 
						if (this.readyState === XMLHttpRequest.DONE && this.status === 200) 
						{
							var propertiesImg = JSON.parse(this.responseText);
							propertiesImg.forEach(createPropertyImages);
							
							function createPropertyImages(image)
							{
                                Images.push(image["MEDIASRC"]);
							}		
						}   
					}
					xmlhttp.send('PROPERTY_KEY=' + property_key);

                    var imagePopup = document.getElementById("imagePopup");
                    imagePopup.style.display = "block";

                    var i = 0;

                    image_slider_tag = document.getElementById("slider");
	                image_slider_tag.src = "..\\PropertyImages\\"+Images[i];
	                image_slider_tag.width = "400";
	                image_slider_tag.height = "200";
	                link_tag = document.getElementById("link");
	                link_tag.href = "..\\PropertyImages\\"+Images[i];

                    document.getElementById("next").onclick=function(){
                        if(i < (Images.length - 1)){
		                    i = i+1;
	                    }else{
		                    i = 0;
	                    }
	                    image_slider_tag.src = "..\\PropertyImages\\"+Images[i];
	                    link_tag.href = "..\\PropertyImages\\"+Images[i];
                    };

                    document.getElementById("previous").onclick=function(){
                        if(i > 0){
		                    i = i-1;
	                    }else{
		                    i = (Images.length - 1);
	                    }
	                    image_slider_tag.src = "..\\PropertyImages\\"+Images[i];
	                    link_tag.href = "..\\PropertyImages\\"+Images[i];
                    };

                    var span = document.getElementsByClassName("close")[0];
                        span.onclick = function() {
                            imagePopup.style.display = "none";
                        };
 
                     window.onclick = function(event) {
                         if (event.target == imagePopup) {
                             imagePopup.style.display = "none";
                         } 
                     };

				};
               img_td_tag.appendChild(img_tag); 
               tr_tag.appendChild(img_td_tag);

               title_td_tag = document.createElement("td");
               //title_td_tag.padding = "10px 30px";
               title_p_tag = document.createElement("p");
			   title_p_tag.style.color = "#4682B4";
               title_p_tag.class = "title";
               title_p_tag.innerHTML = property_name;
			   
               address_p_tag = document.createElement("p");
               address_p_tag.class = "title";
               address_p_tag.style.fontSize = "25px";
               address_p_tag.innerHTML = property_address1 +",<br> " + property_address2 +",<br> " + zip_code + ", " + city + ", " + state ;
			   
               title_td_tag.appendChild(title_p_tag); 
               title_td_tag.appendChild(address_p_tag); 
               tr_tag.appendChild(title_td_tag); 

               menu_td_tag = document.createElement("td");
               //menu_td_tag.padding = "10px";
               menu_td_tag.align = "center";
               update_button = document.createElement("button");
               update_button.type = "button";
               update_button.className = "button"
               update_button.style="width: 100px;margin-top: 0px;margin-right: 5px;";
               update_button.onclick = function(){
                     var property = document.getElementById("propertyPopup");
                     property.style.display = "block";
 
                     document.getElementById("propTitle").innerHTML =  property_name;
                     document.getElementById("sqft").innerHTML = "Total Area: " + property_sqr_feet + " Sq ft.";
                     document.getElementById("parking").innerHTML = "Parking: " + property_parking;
                     document.getElementById("bed").innerHTML = "Total Bed: " + property_bed;
                     document.getElementById("bath").innerHTML = "Bath: " + property_bath;
                     document.getElementById("pet").innerHTML = "Pets: " + (property_pet ? 'Friendly' : 'Not Friendly');
					 document.getElementById("lease").innerHTML = "Lease Min: " + lease_min + " <br> Max: " + lease_max;
					 
                      

                     var span = document.getElementsByClassName("close")[0];
 
                     span.onclick = function() {
                         property.style.display = "none";
                     };
 
                     window.onclick = function(event) {
                         if (event.target == property) {
                             property.style.display = "none";
                         } 
                     };
                }; 
               update_button.innerHTML = "View";
               
               menu_td_tag.appendChild(update_button); 
               tr_tag.appendChild(menu_td_tag); 

               document.getElementById("propertiesTable").appendChild(tr_tag);  
            }
        }
    };
    xmlhttp.open("GET", "../php/GetAvailableProperties.php", true);
    xmlhttp.send();
}