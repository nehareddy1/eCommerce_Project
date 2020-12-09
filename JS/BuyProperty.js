function getProperty(propertyKey) {
	
    var xhr = new XMLHttpRequest();
    xhr.open("POST", '../php/GetPropertyUser.php', true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function() {
        if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
            
        var obj = JSON.parse(this.responseText);
			propertyId.value = obj.ID;
            propertyTitle.innerHTML = obj.NAME;
            propertyPrice.value = obj.PRICE;
            amount.value = obj.PRICE;
        }   
    }
    xhr.send('PROPERTY_KEY=' + propertyKey);
}
