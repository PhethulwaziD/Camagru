<?php
	require_once('../../config/database.php');
	include_once('upload.php');
	session_start();
	if ($_SESSION['id'] == null){
		header('Location: ../../index.php');
	}
?>
<!DOCTYPE html>
<html>
	<?php include_once('header.html'); ?>
	<div class="upcoming-container">
		<div class="upcoming-images">
			<form  action = "upload_image.php" method="POST" enctype="multipart/form-data">	
				<input class="button" type="file" name="file">
				<div class="button">
					<button class="upload" type="submit" name="upload" class="upload_image" >Post</button>
				</div>
				
				<br>
				<p>or</p>
				<br>	
				<p><a href="photo_booth.php">Photo Booth</a></p>
			</form>
		</div>
	</div>
</body>
<script type="text/javascript" src="script.js"></script>
</html>