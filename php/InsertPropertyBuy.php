<?php
	session_start();
    // Get SQL Connection object
    include 'Connection.php';
    $conn = $GLOBALS['SQL_CONN'];       
	
    $PROPERTY_NAME = $_POST['propertyTitle'];
    $PROPERTY_TYPE = $_POST['propertyType'];
    $PROPERTY_PRICE = $_POST['propertyPrice'];
    $PROPERTY_ADDRESS1 = $_POST['propertyAddress1'];
    $PROPERTY_ADDRESS2 = $_POST['propertyAddress2'];
    $PROPERTY_ZIP = $_POST['propertyZip'];
	$user_id = $_SESSION['user_id'];
    $PROPERTY_SQUARE_FEET = $_POST['propertySqrFt'];
	$PROPERTY_BED = $_POST['propertyBed'];
    $PROPERTY_BATH = $_POST['propertyBath'];
    $BUY_DESCRIPTION = $_POST['propertyNote'];

    $query = "INSERT INTO property_buy ( property_name, type_id, property_price, property_address1, property_address2, zip_id, user_id,  
              property_square_feet, property_bed, property_bath, buy_description)
              VALUES('$PROPERTY_NAME','$PROPERTY_TYPE','$PROPERTY_PRICE', '$PROPERTY_ADDRESS1','$PROPERTY_ADDRESS2','$PROPERTY_ZIP','$user_id',
              '$PROPERTY_SQUARE_FEET','$PROPERTY_BED','$PROPERTY_BATH', '$BUY_DESCRIPTION')";
    echo $query;
            
    mysqli_query($conn, $query);

    //Get primary key
    $PROPERTY_ID = mysqli_insert_id($conn);
    echo $PROPERTY_ID." :ID";
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
				echo($insert);
				if($insert){ 
					$errorUpload = !empty($errorUpload)?'Upload Error: '.trim($errorUpload, ' | '):''; 
					$errorUploadType = !empty($errorUploadType)?'File Type Error: '.trim($errorUploadType, ' | '):''; 
					$errorMsg = !empty($errorUpload)?'<br/>'.$errorUpload.'<br/>'.$errorUploadType:'<br/>'.$errorUploadType; 
					$statusMsg = "Files are uploaded successfully.".$errorMsg; 
				}else{ 
					$statusMsg = "Sorry, there was an error uploading your file."; 
				} 
			}else{ 
				$statusMsg = 'Please select a file to upload.'; 
			}
		}
		
		header("Location: ../html/HomeUserLogin.php");

?>