<?php
    if($_FILES['image']['name'] != '') {
        $file = $_FILES['image'];
        $uploadDirectory = "uploads/";
        $uploadFile = $uploadDirectory . basename($file['name']);
        
        // Create the uploads directory if it doesn't exist
        if (!is_dir($uploadDirectory)) {
            mkdir($uploadDirectory, 0755, true);
        }
        
        if (move_uploaded_file($file['tmp_name'], $uploadFile)) {
            echo '<img src="' . $uploadFile . '" alt="Uploaded Image" />';
        } else {
            echo 'There was an error uploading the file.';
        }
    } else {
        echo 'Please choose a file.';
    }
?>