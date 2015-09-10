<?php
	
	// Add a constant for our root URL for header redirection. 
	// remember to change this when pushed to Heroku.
	if($_SERVER['REMOTE_ADDR'] == '::1'){
		define("ROOT_URL", "http://localhost/~telwell/image_processing/");	
	} else {
		define("ROOT_URL", "https://fathomless-caverns-7222.herokuapp.com/");
	}

	// I want a helper to use in my view that tells me whether or not I 
	// just converted an image or not.
	function has_halloween_image(){
		return (isset($_GET['halloween_image'])) ? true : false;
	}

	function has_errors(){
		return (isset($_GET['errors']) && $_GET['errors'] == true) ? true : false;
	}

	// This is our main function for turning an image into a 
	// SPOOKY image.
	function halloween_convert($image_path, $imagine){	
		// At this point the image will already have been 
		// successfully uploaded, now we'll open it.
		$image = $imagine->open(__DIR__ . '/public/' . $image_path);

		// Add our SPOOKY effects to the photo!
		$image->effects()
		    ->negative()
		    ->gamma(1.3);

		// If we can save the image in the /public directory return true, otherwise false. 
		return ($image->save(__DIR__ . '/public/' . 'halloween_' . $image_path)) ? true : false;
	}

	// According to SO (http://stackoverflow.com/questions/12761445/php-how-to-use-getimagesize-to-check-image-type-on-upload)
	// getimagesize() is a good way to make sure that we've uploaded an actual image.
	function check_valid_image(){
		return (getimagesize($_FILES["fileToUpload"]["tmp_name"]) !== false) ? false : true;
	}

	// If the file already exists then we don't want to upload it again.
	function check_file_exists($file){
		// Check if file already exists
    return (file_exists($file)) ? true : false;
	}

	function check_valid_file_format($imageFileType){
		// Allow certain file formats. Return true (to has_errors) if it's not one of these formats.
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
			return true;
    }
	}

	function finalize_image_upload($has_errors, $target_file, $naked_file){
		// First check if we have any errors.
    if ($has_errors == true) {
    	header("Location: ". ROOT_URL . "?errors=true" );
    } else {
    	// If no errors then attempt to move the uploaded file to the /public
    	// directory.
	    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        
        // Then convert the image to our halloween format.
        $imagine = new Imagine\Gd\Imagine();
        halloween_convert($naked_file, $imagine);

        // And finally redirect to the root url with the halloween image as a parameter.
        header("Location: ". ROOT_URL . "?halloween_image=halloween_" . $naked_file );
	    } else {
	    	
	    	// If there was an error moving the file then return to the homepage 
	    	// with an error.
				header("Location: ". ROOT_URL . "?errors=true" );
	    }
    }
	}

?>