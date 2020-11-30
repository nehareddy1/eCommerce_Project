function first ()
{	
	document.getElementById("fier").innerHTML = "string of lower or upper case letters of length at least two";	
}
function last()
{
	document.getElementById("laer").innerHTML = "string of lower or upper case letters of length at least two";
}
function phone ()
{
	document.getElementById("pher").innerHTML = "xxx-xxx-xxxx (numbers)";
}
function email ()
{
	document.getElementById("emer").innerHTML = "xxxxx@yyyyy.zzz";
}
function  addr()
{
	document.getElementById("ader").innerHTML = "street, city, state, zipcode";
}
function  pass()
{
	document.getElementById("per").innerHTML = "Atleast 1Uppercase, 1Lowercase, 1Number in order. Example: Pw1";
}
	
	
function firstOut ()
{
	document.getElementById("fier").innerHTML = "";
}
function lastOut ()
{
	document.getElementById("laer").innerHTML = "";
}
function phoneOut ()
{
	document.getElementById("pher").innerHTML = "";
}
function eOut ()
{
	document.getElementById("emer").innerHTML = "";
}
function adOut ()
{
	document.getElementById("ader").innerHTML = "";
}
function passOut ()
{
	document.getElementById("per").innerHTML = "";
}
	
	
function firstFocus ()
{
	var box = document.getElementById("fir");
	box.style.background = "white";
}
function lastFocus ()
{
	var box1 = document.getElementById("las");
	box1.style.background = "white";
}
function phoneFocus ()
{
	var box2 = document.getElementById("ph");
	box2.style.background = "white";
}
function eFocus ()
{
	var box3 = document.getElementById("userId1");
	box3.style.background = "white";
}
function passFocus ()
{
	var box4 = document.getElementById("password1");
	box4.style.background = "white";
}
	
function firstBlur()
{
	var box = document.getElementById("fir");
	var firstName = document.getElementById ("fir").value;
	if (firstName!="")
		idPassPhoneChange ();
	else
		box.style.background = "red";
}
function lastBlur()
{
	var box1 = document.getElementById("las");
	var lastName = document.getElementById ("las").value;
	if (lastName!="")
		idPassPhoneChange ();
	else
		box1.style.background = "red";
}
function phoneBlur()
{
	var box2 = document.getElementById("ph");
	var phoneNum = document.getElementById ("ph").value;
	if (phoneNum!="")
		idPassPhoneChange ();
	else
		box2.style.background = "red";
}
function eBlur()
{
	var box3 = document.getElementById("userId1");
	var eb = document.getElementById ("userId1").value;
	if (eb!="")
		idPassPhoneChange ();
	else
		box3.style.background = "red";
}
function passBlur()
{
	var box4 = document.getElementById("password1");
	var pb = document.getElementById ("password1").value;
	if (pb!="")
		idPassPhoneChange ();
	else
		box4.style.background = "red";
}
	
function idPassPhoneChange ()
{
	var firstName = document.getElementById ("fir").value;
	var lastName = document.getElementById ("las").value;
	var phoneNum = document.getElementById ("ph").value;
	var email = document.getElementById ("userId1").value;
	var pass = document.getElementById ("password1").value;
	var firstColor = document.getElementById("fir");
	var lastColor = document.getElementById("las");
	var phoneColor = document.getElementById("ph");
	var emailColor = document.getElementById ("userId1");
	var passColor = document.getElementById ("password1");
			
	if ((pass.search(/^[A-Z]+[a-z]+[0-9]+$/) == 0) && (email.search(/^[a-zA-Z]+[0-9]*@[a-zA-Z]+.[a-zA-Z]+$/) == 0) && (phoneNum.search(/^\d{3}-\d{3}-\d{4}$/) == 0) && (firstName.search(/^[a-zA-Z][a-zA-Z]+$/)==0) && (lastName.search(/^[a-zA-Z][a-zA-Z]+$/)==0)){
		
		firstColor.style.background = "white";
		lastColor.style.background = "white";
		phoneColor.style.background = "white";
		emailColor.style.background = "white";
		passColor.style.background = "white";
					
	}	
	if (firstName.search(/^[a-zA-Z][a-zA-Z]+$/)!=0 && firstName!=""){
		firstColor.style.background = "red";	
	}
			
	if (lastName.search(/^[a-zA-Z][a-zA-Z]+$/)!=0 && lastName!=""){
		lastColor.style.background = "red";			
	}		
	
	if (phoneNum.search(/^\d{3}-\d{3}-\d{4}$/)!= 0 && phoneNum!=""){
		phoneColor.style.background = "red";	
	}

	if (email.search(/^[a-zA-Z]+[0-9]*@[a-zA-Z]+.[a-zA-Z]+$/)!= 0 && email!=""){
		emailColor.style.background = "red";	
	}

	if (pass.search(/^[A-Z]+[a-z]+[0-9]+$/)!= 0 && pass!=""){
		passColor.style.background = "red";	
	}		
}