<?php
    // These need to be added here as well since I'm not including
    // the header.php file here. I'm not including it becuase then 
    // the header redirect below would no longer work properly.
    require 'vendor/autoload.php';
    require 'functions.php';

    // Since we're using some specific Imagine effects we'll
    // need to include them directly here as well.
    use Imagine\Effects;

    // Setting the general variables used to make our upload work.
    $target_dir = "public/";
    $naked_file = basename($_FILES["fileToUpload"]["name"]);
    $target_file = $target_dir . $naked_file;
    $has_errors = false;
    $image_file_type = pathinfo($target_file,PATHINFO_EXTENSION);
    
    // Perform our checks on the image. We want to make sure it's an image, 
    // that the file doesn't already exist on our server, and that it's a valid
    // image file format.
    $has_errors = check_valid_image();
    $has_errors = check_file_exists($target_file);
    $has_errors = check_valid_file_format($image_file_type); 
    
    finalize_image_upload($has_errors, $target_file, $naked_file);

?>