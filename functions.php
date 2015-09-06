<?php
	
	// Add a constant for our root URL for header redirection. 
	// remember to change this when pushed to Heroku.
	if($_SERVER['REMOTE_ADDR'] == '::1'){
		define("ROOT_URL", "http://localhost/~telwell/image_processing/");	
	} else {
		define("ROOT_URL", "https://fathomless-caverns-7222.herokuapp.com/");
	}
	

	// This is our main function for turning an image into a 
	// 'SPOOKY' image.
	function halloween_format($image_path, $imagine) 
	{	
		// At this point the image will already have been 
		// successfully uploaded, now we'll open it.
		$image = $imagine->open(__DIR__ . '/public/' . $image_path);

		// Add our SPOOKY effects to the photo!
		$image->effects()
		    ->negative()
		    ->gamma(1.3);

		// Save the image in the /public directory.
		$image->save(__DIR__ . '/public/' . 'halloween_' . $image_path);

		// return the image path to be used in the URL later.
		return $image_path;
	}

?>