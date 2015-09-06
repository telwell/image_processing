<?php 
	require 'vendor/autoload.php';
	require 'functions.php';

	// These are necessary in order for Imagine 
	// to function properly. I would have added this in 
	// the function (where the image is actually created) 
	// but in order to keep things modular I just pass the 
	// halloween_format function the $imagine object instantiated here.
	$imagine = new Imagine\Gd\Imagine();
	use Imagine\Effects; 
?>

<html>
	<head>
	
		<title>Image Processor Code Challenge</title>
		
		<!-- Including Bootstrap via CDN -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<!-- Add my own custom CSS -->
		<link rel="stylesheet" href="css/style.css">
		<!-- Include jQuery for Bootstrap -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

	</head>