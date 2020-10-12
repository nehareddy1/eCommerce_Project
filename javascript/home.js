//Phone Number Validation (It will only allow numbers,+,(,) & space)
function isNumberKey(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode;

    if (charCode != 32 && charCode != 40 && charCode != 41 && charCode != 43 && charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
        
    return true;
}

function loadAdminHomePage() 
{
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() 
    {
        if (this.readyState == 4 && this.status == 200) 
        {
            var obj = JSON.parse(this.responseText);
            document.getElementById("homeDescription").innerHTML = obj.DESCRIPTION;
            document.getElementById("add").setAttribute('value', obj.ADDRESS);
            document.getElementById("contact").setAttribute('value', obj.CONTACT_NUMBER);
            document.getElementById("email").setAttribute('value', obj.EMAIL_ADDRESS);
            document.getElementById("facebook").setAttribute('value', obj.FACEBOOK);
        }
    };
    xmlhttp.open("GET", "../php/GetAboutUs.php", true);
    xmlhttp.send();
}

//Load Home Page Information
function loadHomePage() 
{
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() 
    {
        if (this.readyState == 4 && this.status == 200) 
        {
            var obj = JSON.parse(this.responseText);        
            //document.getElementById("homeVideo").innerHTML = obj.VIDEO_URL.trim();
        }
    };
    xmlhttp.open("GET", "../php/GetHomePage.php", true);
    xmlhttp.send();

    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() 
    {
        if (this.readyState == 4 && this.status == 200) 
        {
            var obj = JSON.parse(this.responseText);
            document.getElementById("homeDescription").innerHTML = obj.DESCRIPTION;
            document.getElementById("add").innerHTML = obj.ADDRESS;
            document.getElementById("contact").innerHTML = obj.CONTACT_NUMBER;
            document.getElementById("email").innerHTML = obj.EMAIL_ADDRESS;
            document.getElementById("facebook").href = obj.FACEBOOK;
        }
    };
    xmlhttp.open("GET", "../php/GetAboutUs.php", true);
    xmlhttp.send();
}

//Update Home Page
function setHome()
{
    var payload = {};

    payload.DESCRIPTION = document.getElementById("homeDescription").value;
    payload.COMPANY_ADDRESS = document.getElementById("add").value;
    payload.COMPANY_CONTACT_NUMBER = document.getElementById("contact").value;
    payload.COMPANY_FAX_NUMBER = "";
    payload.COMPANY_EMAIL_ADDRESS = document.getElementById("email").value;
    payload.COMPANY_FACEBOOK = document.getElementById("facebook").value;

    var xhr = new XMLHttpRequest();
    xhr.open("POST", '../php/UpdateAboutUs.php', true);

    //Send the proper header information along with the request
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function() { // Call a function when the state changes.
        if (this.readyState === XMLHttpRequest.DONE && this.status === 200) 
        {
            alert("Home page successfully updated");
        }   
    }
    jpayload = 'DESCRIPTION='+payload.DESCRIPTION+'&COMPANY_ADDRESS='+payload.COMPANY_ADDRESS+'&COMPANY_CONTACT_NUMBER='+payload.COMPANY_CONTACT_NUMBER+'&COMPANY_FAX_NUMBER='+payload.COMPANY_FAX_NUMBER+'&COMPANY_EMAIL_ADDRESS='+payload.COMPANY_EMAIL_ADDRESS+'&COMPANY_FACEBOOK='+payload.COMPANY_FACEBOOK;
    //jpayload = 'DESCRIPTION='+document.getElementById('description').value+'&COMPANY_ADDRESS='+document.getElementById('address').value+'&COMPANY_CONTACT_NUMBER='+document.getElementById('contactNumber').value+'&COMPANY_FAX_NUMBER='+document.getElementById('fax').value+'&COMPANY_EMAIL_ADDRESS='+document.getElementById('email').value+'&COMPANY_FACEBOOK='+document.getElementById('facebook').value
    xhr.send(jpayload);
    loadAdminHomePage();
}

function emailValidation(email){
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    console.log(re.test(String(email)));
    return re.test(String(email).toLowerCase());
}