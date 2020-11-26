var Images = [];
function getPropertiesUser()
{
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() 
    {
        if (this.readyState == 4 && this.status == 200) 
        {
            var properties = JSON.parse(this.responseText);
            properties.forEach(createProperty);
            
            function createProperty(property, index)
            {
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
               img_tag.width = "100";
               img_tag.height = "100";
               img_tag.align = "center";
               img_tag.onclick = function (){
					var xmlhttp = new XMLHttpRequest();
					xmlhttp.open("POST", '../php/GetPropertyImages.php', true);
					xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

					xmlhttp.onreadystatechange = function() { 
						if (this.readyState === XMLHttpRequest.DONE && this.status === 200) 
						{
							var propertiesImg = JSON.parse(this.responseText);
							propertiesImg.forEach(createPropertyImages);
							
							function createPropertyImages(img)
							{
								Images.push(img["MEDIASRC"]);
								imgSlider_tag = document.createElement("img");
								imgSlider_tag.src = "..\\PropertyImages\\"+img["MEDIASRC"];
								imgSlider_tag.width = "500";
								//imgSlider_tag.height = "100%";
								document.getElementById("imgSelected").appendChild(imgSlider_tag);
								
								img_div_tag = document.createElement("div");
								img_div_tag.class = "column";
								img_dot_tag = document.createElement("img");
								img_dot_tag.src = "..\\PropertyImages\\"+img["MEDIASRC"];
								img_dot_tag.className = "demo cursor";
								img_div_tag.appendChild(img_dot_tag);
								document.getElementById("imgContent").appendChild(img_div_tag);
								openModal();
								currentSlide(1);
							}
								
						}   
					}
					xmlhttp.send('PROPERTY_KEY=' + property_key);
					
				}
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

function openModal() {
  document.getElementById("imgSlider").style.display = "block";
}

function closeModal() {
  document.getElementById("imgSlider").style.display = "none";
}

var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}