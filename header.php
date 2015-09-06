<?php 
	error_reporting(-1);
	require 'vendor/autoload.php';
	require 'functions.php';
	$imagine = new Imagine\Gd\Imagine();
	use Imagine\Effects; 
?>

<html>
	<head>
	
		<title>Image Processor Code Challenge</title>
		
		<!-- Including Bootstrap via CDN -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<!-- Include jQuery for Bootstrap -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

	</head>