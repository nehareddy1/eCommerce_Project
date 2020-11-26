function getJob(jobId) {
    document.getElementById('jobId').value = jobId;

    var xhr = new XMLHttpRequest();
    xhr.open("POST", '../php/GetJob.php', true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function() {
        if (this.readyState === XMLHttpRequest.DONE && this.status === 200) 
        {
            var obj = JSON.parse(this.responseText);
            jobTitle.value = obj.TITLE;
            jobDescription.value = obj.DESCRIPTION;
            propertyTitle.value = obj.PROPERTYID;
            jobNote.value = obj.NOTE;
        }   
    }
    xhr.send('JOB_ID=' + jobId);
}