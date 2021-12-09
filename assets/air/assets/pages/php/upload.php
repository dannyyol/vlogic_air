<?php

//$files = array_filter($_FILES['upload']['name']); //something like that to be used before processing files.


  $errFlag = false;
if(!empty($_POST['v_job_num'])){
    $v_doc = $_POST['v_doc'];
}else{
    $errFlag = true;
}




    session_start();
    $v_email = $_SESSION['v_email'];



// File upload path
    $targetDir = "uploads/";
    $fileName = basename($_FILES["files"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf','docx');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["files"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
            $insert = "INSERT INTO vlogic_job_docs (id,v_email,v_doc,v_doc_type,v_doc_date) VALUES ('', '$v_email', '$fileName', '$v_doc', NOW())";
            $inserter = mysqli_query($connect_me,$insert);
            if($inserter){
                $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
            }else{
                $statusMsg = "File upload failed, please try again.";
            }
        }else{
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    }else{
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }
}else{
    $statusMsg = 'Please select a file to upload.';
}
 ?>
