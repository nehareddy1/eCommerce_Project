function getPropertyImages(propertyKey){

    document.getElementById("propertyId").value = propertyKey;

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("POST", '../php/GetPropertyImages.php', true);
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xmlhttp.onreadystatechange = function() {

        if (this.readyState == 4 && this.status == 200) {
            var images = JSON.parse(this.responseText);
            images.forEach(createimage);
            
            function createimage(img) {

                var img_id = img['MEDIAID'];
                var img_src = img['MEDIASRC'];

                tr_tag = document.createElement("tr");

                    img_td_tag = document.createElement("td");
                        img_tag = document.createElement("img");
                        img_tag.src = "..\\PropertyImages\\"+img_src;
                        img_tag.width = "100";
                        img_tag.height = "100";
                        img_tag.id = img_id;
                        img_td_tag.appendChild(img_tag); 
                    tr_tag.appendChild(img_td_tag);

                    button_td_tag = document.createElement("td");
                        delete_button = document.createElement("button");
                        delete_button.type = "button";
                        delete_button.onclick = function(){
                            console.log(img_id);
                            var xmlhttp = new XMLHttpRequest();
                            xmlhttp.open("GET", "../php/DeleteImage.php?ID=" +  img_id, true);
                            xmlhttp.send();
                            location.reload();
                        }; 
                        delete_button.innerHTML = "Delete";
						delete_button.className = "button"
						delete_button.style="width: 100px;margin-top: 0px;margin-right: 5px;";
                        button_td_tag.appendChild(delete_button); 
						tr_tag.appendChild(button_td_tag);

                document.getElementById("imagesTable").appendChild(tr_tag);  
            }
        }
    };
    xmlhttp.send('PROPERTY_KEY=' + propertyKey);
}