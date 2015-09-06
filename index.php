<?php require('header.php'); ?>

<body>
	<main class="container">
		<section class="col-sm-12">

			<form action="upload.php" method="post" enctype="multipart/form-data">
		    Select image to upload:
		    <input type="file" name="fileToUpload" id="fileToUpload">
		    <input class="btn btn-success" type="submit" value="Upload Image" name="submit">
			</form>

		</section>
		
		<div class="col-sm-12">
			<?php echo ROOT_URL; ?>
			<?php if(isset($_GET['halloween_image'])): ?>

				<div class="col-sm-10 col-sm-offset-1 halloween-image">
					<img src="<?php echo(ROOT_URL); ?>public/<?php echo $_GET['halloween_image']; ?>">
				</div>

			<?php endif; ?>
		</div>
			
	</main>

</body>

<?php require('footer.php'); ?>