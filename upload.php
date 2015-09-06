<?php
    // These need to be added here as well since I'm not including
    // the header.php file here. I'm not including it becuase then 
    // the header redirect below would no longer work properly.
    require 'vendor/autoload.php';
    require 'functions.php';
    $imagine = new Imagine\Gd\Imagine();
    use Imagine\Effects;

    $target_dir = "public/";
    $naked_file = basename($_FILES["fileToUpload"]["name"]);
    $target_file = $target_dir . $naked_file;
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            halloween_format($naked_file, $imagine);
            header("Location: ". ROOT_URL . "?halloween_image=halloween_" . $naked_file );
            die();
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
?>