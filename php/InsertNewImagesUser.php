<?php
    include 'Connection.php';
    $conn = $GLOBALS['SQL_CONN']; 

	$PROPERTY_ID = $_POST['Id'];

    $targetDir = "../PropertyImages/"; 
    $allowTypes = array('jpg','png','jpeg','gif');
	$statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';
	
	$fileNames = array_filter($_FILES['files']['name']);

	if(!empty($fileNames)){

        foreach($_FILES['files']['name'] as $key=>$val){

			$fileName = basename($_FILES['files']['name'][$key]); 
            $targetFilePath = $targetDir . $fileName; 
			// Check whether file type is valid 
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
            if(in_array($fileType, $allowTypes)){ 

                // Upload file to server 
                if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){ 

                    // Image db insert sql 
                    $insertValuesSQL .= "('".$fileName."', $PROPERTY_ID),"; 	
                }else{ 
                    $errorUpload .= $_FILES['files']['name'][$key].' | '; 
                } 
            }else{ 
                $errorUploadType .= $_FILES['files']['name'][$key].' | '; 
            } 
		}
		
		if(!empty($insertValuesSQL)){ 
			$insertValuesSQL = trim($insertValuesSQL, ','); 
			// Insert image file name into database 
			$insert = $conn->query("INSERT INTO property_media_buy (media_src, property_id) VALUES $insertValuesSQL"); 
			if($insert){ 
				$errorUpload = !empty($errorUpload)?'Upload Error: '.trim($errorUpload, ' | '):''; 
				$errorUploadType = !empty($errorUploadType)?'File Type Error: '.trim($errorUploadType, ' | '):''; 
				$errorMsg = !empty($errorUpload)?'<br/>'.$errorUpload.'<br/>'.$errorUploadType:'<br/>'.$errorUploadType; 
				$statusMsg = "Files are uploaded successfully.".$errorMsg; 
				header("Location: ../html/UpdateImageUser.php");
			}else{ 
				$statusMsg = "Sorry, there was an error uploading your file."; 
			} 
		}else{ 
			$statusMsg = 'Please select a file to upload.'; 
			echo($statusMsg);
		}
	}else{
		echo("NO");
	}
?>