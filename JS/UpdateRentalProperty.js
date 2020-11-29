function getProperty(propertyKey) {
	
    var xhr = new XMLHttpRequest();
    xhr.open("POST", '../php/GetProperty.php', true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function() {
        if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
            
        var obj = JSON.parse(this.responseText);
			propertyId.value = obj.ID;
            propertyTitle.innerHTML = obj.NAME;
            propertyPrice.value = obj.PRICE;
            propertyType.value = obj.TYPE;
            propertyAddress1.value = obj.ADDRESS1;
            propertyAddress2.value = obj.ADDRESS2;
            propertyCity.value = obj.CITY;
            propertyState.value = obj.STATE;
            propertyZip.value = obj.ZIPCODE;
			zipID.value = obj.ZIPID;

            if(obj.AVAILABLE == 1)
                propertyAvailable.checked=true;
            else
                propertyAvailable.checked=false;

            propertySqrFt.value = obj.SQUARE_FEET;
            propertyBed.value = obj.BED;
            propertyBath.value = obj.BATH;
            propertyParking.value = obj.PARKING;
            propertyMinLease.value = obj.LEASE_MIN;
            propertyMaxLease.value = obj.LEASE_MAX;
            propertyNote.value = obj.NOTE;

            if(obj.PET_FRIENDLY == 1)
                petYes.checked=true;
            else
                petNo.checked=true;
        }   
    }
    xhr.send('PROPERTY_KEY=' + propertyKey);
}