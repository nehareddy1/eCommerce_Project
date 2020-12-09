function getBuyProperties() {

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {

        if (this.readyState == 4 && this.status == 200) {

            var properties = JSON.parse(this.responseText);
            properties.forEach(createProperty);
            
            function createProperty(property) {
                var property_key = property['ID'];
                var property_name = property['NAME'];
                var property_type = property['TYPE'];
                var property_price = property['PRICE'];
                var property_address1 = property['ADDRESS1'];
			    var property_address2 = property['ADDRESS2'];
			    var zip_code = property['ZIPCODE'];
			    var city = property['CITY'];
			    var state = property['STATE'];
			    var property_sqr_feet = property['SQUARE_FEET'];
                var property_bed = property['BED'];
                var property_bath = property['BATH'];
                var property_note = property['DESCRIPTION'];

                var user_name = property['USERNAME'];
                var user_address = property['USERADD'];
                var user_phone = property['USERPHONE'];
                var user_email = property['USEREMAIL'];

                if(property['IMAGE'] === null){
                    var img = "default.png"; 
                    var flag = 0;
                }else{
                    var img = property['IMAGE'];
                    var flag = 1;
                }

                tr_tag = document.createElement("tr");
                    td_tag = document.createElement("td");
                    td_tag.colSpan = "4";
                        hr_tag = document.createElement("hr");
                        td_tag.appendChild(hr_tag);
                    tr_tag.appendChild(td_tag); 
                document.getElementById("propertiesTable").appendChild(tr_tag);  

                tr_tag = document.createElement("tr");

                img_td_tag = document.createElement("td");
                    img_tag = document.createElement("img");
                    img_tag.src = "..\\PropertyImages\\"+img;
                    img_tag.width = "200";
                    img_tag.height = "150";
                    img_tag.align = "center";
                    if (flag == 1){
                        img_tag.onclick = function (){
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

                            var span2 = document.getElementsByClassName("close")[0];
                                span2.onclick = function() {
                                    imagePopup.style.display = "none";
                                };
 
                            window.onclick = function(event) {
                                if (event.target == imagePopup) {
                                    imagePopup.style.display = "none";
                                } 
                            };
				        };

                        var Images = [];
			            var xhr = new XMLHttpRequest();
			            xhr.open("POST", '../php/GetBuyPropertyImages.php', true);
				        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

				        xhr.onreadystatechange = function() { 
					        if (this.readyState === xhr.DONE && this.status === 200) 
					        {
						        var propertiesImg = JSON.parse(this.responseText);
						        propertiesImg.forEach(createPropertyImages);
							
						        function createPropertyImages(image)
						        {
                                    Images.push(image["MEDIASRC"]);
						        }		
					        }   
				        }
				    xhr.send('PROPERTY_KEY=' + property_key);
                }
                img_td_tag.appendChild(img_tag); 
                tr_tag.appendChild(img_td_tag);


                title_td_tag = document.createElement("td");
                title_td_tag.style.verticalAlign = "top";
                title_p_tag = document.createElement("p");
                title_p_tag.class = "title";
                title_p_tag.innerHTML = property_name + " - " + property_type;
			   
                address_p_tag = document.createElement("p");
                address_p_tag.class = "title";
                address_p_tag.style.fontSize = "21px";
                address_p_tag.innerHTML = property_address1 +", " + property_address2 +"<br> " + zip_code + ", " + city + ", " + state ;
			   
                title_td_tag.appendChild(title_p_tag); 
                title_td_tag.appendChild(address_p_tag); 
                tr_tag.appendChild(title_td_tag); 

                user_td_tg = document.createElement("td");
                user_td_tg.style.paddingTop= "3%";
                user_td_tg.style.verticalAlign = "top";
                user_td_tg.style.fontSize = "21px";
                user_td_tg.innerHTML = "Name: " + user_name + "<br><br>Address: " + user_address + 
                                        "<br><br>Phone: " + user_phone + "<br><br>Email: " + user_email; 
                tr_tag.appendChild(user_td_tg);

                menu_td_tag = document.createElement("td");
                menu_td_tag.style.paddingTop= "3%";
                menu_td_tag.style.verticalAlign = "top";
				
				form_tag = document.createElement("form");
				form_tag.action = "https://www.sandbox.paypal.com/cgi-bin/webscr";
				form_tag.method = "post";
				form_tag.target = "_top";
                form_tag.style.display = "inline";
				
				hidden_tag = document.createElement("input");
				hidden_tag.type = "hidden";
				hidden_tag.value = "sb-wn9gx4022747@business.example.com";
				hidden_tag.name = "business";
				form_tag.appendChild(hidden_tag);
				
								
				hidden_tag = document.createElement("input");
				hidden_tag.type = "hidden";
				hidden_tag.value = property_key;
				hidden_tag.name = "property_id";
				form_tag.appendChild(hidden_tag);
				
				hidden_tag = document.createElement("input");
				hidden_tag.type = "hidden";
				hidden_tag.value = property_price;
				hidden_tag.name = "amount";
				form_tag.appendChild(hidden_tag);
				
				hidden_tag = document.createElement("input");
				hidden_tag.type = "hidden";
				hidden_tag.value = "1";
				hidden_tag.name = "no_shipping";
				form_tag.appendChild(hidden_tag);
				
				
				hidden_tag = document.createElement("input");
				hidden_tag.type = "hidden";
				hidden_tag.value = "USD";
				hidden_tag.name = "currency_code";
				form_tag.appendChild(hidden_tag);
				
				hidden_tag = document.createElement("input");
				hidden_tag.type = "hidden";
				hidden_tag.value = "http://localhost/eCommerce_Project/Payments/notify.php";
				hidden_tag.name = "notify_url";
				form_tag.appendChild(hidden_tag);
				
				hidden_tag = document.createElement("input");
				hidden_tag.type = "hidden";
				hidden_tag.value = "http://localhost/eCommerce_Project/Payments/cancel.php";
				hidden_tag.name = "cancel_return";
				form_tag.appendChild(hidden_tag);
				
				hidden_tag = document.createElement("input");
				hidden_tag.type = "hidden";
				hidden_tag.value = "http://localhost/eCommerce_Project/Payments/return.php";
				hidden_tag.name = "return";
				form_tag.appendChild(hidden_tag);
				
				hidden_tag = document.createElement("input");
				hidden_tag.type = "hidden";
				hidden_tag.value = "_xclick";
				hidden_tag.name = "cmd";
				form_tag.appendChild(hidden_tag);
				
				buy_button = document.createElement("input");
                buy_button.type = "submit";
				buy_button.className = "button";
				buy_button.style.marginRight = "1%";
				buy_button.value = "Buy";
                form_tag.appendChild(buy_button);
				menu_td_tag.appendChild(form_tag);
				
                view_button = document.createElement("button");
                view_button.type = "button";
                view_button.className = "button"
                view_button.onclick = function(){
                     var property = document.getElementById("propertyPopup");
                     property.style.display = "block";
 
                     document.getElementById("propTitle").innerHTML =  property_name + " - $" + property_price;
                     document.getElementById("sqft").innerHTML = "<b>Total Area:</b> " + property_sqr_feet + "Sqft.";
                     document.getElementById("bed").innerHTML = "<b>Total Bed:</b> " + property_bed;
                     document.getElementById("bath").innerHTML = "<b>Total Bath:</b> " + property_bath;
                     document.getElementById("note").innerHTML = "<b>Extra Note:</b> " + property_note;

                     var span1 = document.getElementsByClassName("close")[1];
                     span1.onclick = function() {
                         property.style.display = "none";
                     };
 
                     window.onclick = function(event) {
                         if (event.target == property) {
                             property.style.display = "none";
                         } 
                     };
                }; 

                view_button.innerHTML = "View";
                menu_td_tag.appendChild(view_button); 
                tr_tag.appendChild(menu_td_tag); 

                document.getElementById("propertiesTable").appendChild(tr_tag);  
            }
        }
    };
    xmlhttp.open("GET", "../php/GetBuyPropertiesAdmin.php", true);
    xmlhttp.send();
}


