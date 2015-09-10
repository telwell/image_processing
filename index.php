<?php require('header.php'); ?>

<body>
	<main class="container">
		<?php if(has_errors()): ?>
			
			<section class="error-flash col-sm-12">
				<div class="alert alert-danger alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <strong>Error!</strong> Your file could not be uploaded, please try again.
				</div>
			</section>

		<?php endif; ?>
		<section class="col-sm-12">
			<?php if(!has_halloween_image()): ?>

				<h2>Welcome to the SPOOKY IMAGE GENERATOR!</h2>
				<div class="row">
					<p class='col-sm-6 clearfix'>
						It's getting to be halloween season and we know what you're thinking... what spooky profile image
						am I going to add to my social media accounts so that my friends know I'm super cool? Well, Trevor's 
						spooky image generator is here to help!<br><br>

						Simply upload an image using the form below and the PHP magic will automatically convert your 
						image into something much more SPOOKY! Feel free to convert whatever images you'd like and use 
						them wherever as well. Have a scary Halloween!
					</p>	
				</div>					
				<form action="upload.php" method="post" enctype="multipart/form-data">
			    <p><b>Choose an image to SPOOKIFY:</b></p>
			    
			    <div class="form-group">
			    	<input type="file" name="fileToUpload" id="fileToUpload">
			    </div>

			    <div class="form-group">
			    	<input class="btn btn-success" type="submit" value="Upload Image" name="submit">
			    </div>
				</form>

			<?php endif; ?>

		</section>
		
		<div class="col-sm-12">
			<?php if(has_halloween_image()): ?>
				<h2>WOOOOOO Look at your new SPOOKY image!</h2>
				<p>Happy (soon-to-be) Halloween!</p>
				
				<div class="col-sm-10 col-sm-offset-1 halloween-image">
					<img src="<?php echo(ROOT_URL); ?>public/<?php echo $_GET['halloween_image']; ?>">
				</div>

				<div class="col-sm-3 restart-button">
					<a href="<?php echo ROOT_URL; ?>" class="btn btn-primary pull-right">Upload Another Image!</a>
				</div>

			<?php endif; ?>
		</div>
			
	</main>

</body>

<?php require('footer.php'); ?>