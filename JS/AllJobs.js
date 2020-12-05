function getJobs() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() 
    {
        if (this.readyState == 4 && this.status == 200) 
        {
            var jobs = JSON.parse(this.responseText);
            jobs.forEach(createJob);
            
            function createJob(job)
            {
                var job_id = job['ID'];
                var job_title = job['TITLE'];
                var property_name = job['PROPERTY'];

                tr_tag = document.createElement("tr");

                    title_td_tag = document.createElement("td");
                    title_p_tag = document.createElement("p");
                    title_p_tag.class = "title";
                    title_p_tag.innerHTML = job_title;
			   
                    property_p_tag = document.createElement("p");
                    property_p_tag.style.fontSize = "16px";
                    property_p_tag.innerHTML = "For "+property_name + " Property";
			   
                    title_td_tag.appendChild(title_p_tag); 
                    title_td_tag.appendChild(property_p_tag); 
                    tr_tag.appendChild(title_td_tag); 

                menu_td_tag = document.createElement("td");
                menu_td_tag.align = "center";
                    view_button = document.createElement("button");
                    view_button.type = "button";
                    view_button.className = "button"
                    view_button.style="width: 100px;margin-top: 0px;margin-right: 5px;";
                    view_button.onclick = function(){document.location.href='ViewJobContacts.php?ID=' +  job_id +'&TITLE='+job_title;};
                    view_button.innerHTML = "View";

                    update_button = document.createElement("button");
                    update_button.type = "button";
                    update_button.className = "button"
                    update_button.style="width: 100px;margin-top: 0px;margin-right: 5px;";
                    update_button.onclick = function(){document.location.href='UpdateJob.php?ID=' +  job_id;};
                    update_button.innerHTML = "Update";

                    delete_button = document.createElement("button");
                    delete_button.type = "button";
                    delete_button.onclick = function(){
                        var xmlhttp = new XMLHttpRequest();
                        xmlhttp.open("GET", "../php/DeleteJob.php?ID=" +  job_id, true);
                        xmlhttp.send();
                        location.reload();
                    }; 
                    delete_button.className = "button";
                    delete_button.style="width: 100px;margin-top: 0px;";
                    delete_button.innerHTML = "Delete";
                menu_td_tag.appendChild(view_button);
                menu_td_tag.appendChild(update_button); 
                menu_td_tag.appendChild(delete_button); 
                tr_tag.appendChild(menu_td_tag); 
                document.getElementById("jobsTable").appendChild(tr_tag);  
            }
        }
    };
    xmlhttp.open("GET", "../php/GetJobs.php", true);
    xmlhttp.send();
}

function getJobsUser() {

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {

        if (this.readyState == 4 && this.status == 200) {

            var jobs = JSON.parse(this.responseText);
            jobs.forEach(createJob);
            
            function createJob(job) {

                var job_id = job['ID'];
                var job_title = job['TITLE'];
                var job_description = job['DESCRIPTION'];
                var property_name = job['PROPERTY'];

                tr_tag = document.createElement("tr");

                    image_td_tag = document.createElement("td");
                        image_tag = document.createElement("img");
                        image_tag.src = "../images/repair.png";
                        image_td_tag.appendChild(image_tag);
                    tr_tag.appendChild(image_td_tag); 

                    title_td_tag = document.createElement("td");
                        title_p_tag = document.createElement("p");
                        title_p_tag.class = "title";
                        title_p_tag.innerHTML = job_title;
			   
                        property_p_tag = document.createElement("p");
                        property_p_tag.style.fontSize = "18px";
                        property_p_tag.style.marginLeft = "10%";
                        property_p_tag.innerHTML = "For "+property_name + " Property";
			   
                        title_td_tag.appendChild(title_p_tag); 
                        title_td_tag.appendChild(property_p_tag); 
                    tr_tag.appendChild(title_td_tag); 

                    desciption_td_tag = document.createElement("td");
                    desciption_td_tag.style.verticalAlign = "top";
                        desciption_tag = document.createElement("p");
                        desciption_tag.innerHTML = job_description; 
                        desciption_td_tag.appendChild(desciption_tag);
                    tr_tag.appendChild(desciption_td_tag);

                    interested_td_tag = document.createElement("td");
                        interested_button = document.createElement("button");
                        interested_button.type = "button";
                        interested_button.className = "button";
                        interested_button.onclick = function(){
                            var job = document.getElementById("contactPopup");
                            job.style.display = "block";  

                            var span1 = document.getElementsByClassName("close")[0];
                            span1.onclick = function() {
                                job.style.display = "none";
                            };
 
                            window.onclick = function(event) {
                                if (event.target == job) {
                                    job.style.display = "none";
                                } 
                            };    
                        };
                        interested_button.innerHTML = "Interested";
                        interested_td_tag.appendChild(interested_button);
                        document.getElementById("jbid").value = job_id;
                    tr_tag.appendChild(interested_td_tag);

               document.getElementById("jobsTable").appendChild(tr_tag);  
            }
        }
    };
    xmlhttp.open("GET", "../php/GetJobs.php", true);
    xmlhttp.send();
}