function getContacts(jobId) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", '../php/GetJobContacts.php', true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function() {
        if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {

            if (xhr.responseText.includes("NAME")){
                var contacts = JSON.parse(this.responseText);
                contacts.forEach(createContact);

                function createContact(contact){
                    var name = contact['NAME'];
                    var address = contact['ADDRESS'];
                    var phone = contact['PHONE'];

                    tr_tag = document.createElement("tr");
                        name_td_tag = document.createElement("td");
                        name_td_tag.innerHTML = name;
                        tr_tag.appendChild(name_td_tag); 

                        address_td_tag = document.createElement("td");
                        address_td_tag.innerHTML = address;
                        tr_tag.appendChild(address_td_tag); 

                        phone_td_tag = document.createElement("td");
                        phone_td_tag.innerHTML = phone;
                        tr_tag.appendChild(phone_td_tag); 
                    document.getElementById("contactsTable").appendChild(tr_tag);
                }
            }else{
                document.getElementById("nodata").innerHTML="No Contacts for this Job";
            }
        }   
    };
    xhr.send('JOBID=' + jobId);
}