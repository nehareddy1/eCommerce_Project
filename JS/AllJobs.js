function getJobs()
{
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
                    property_p_tag.class = "title";
                    property_p_tag.innerHTML = "For "+property_name;
			   
                    title_td_tag.appendChild(title_p_tag); 
                    title_td_tag.appendChild(property_p_tag); 
                    tr_tag.appendChild(title_td_tag); 

               menu_td_tag = document.createElement("td");
               menu_td_tag.align = "center";
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