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
	<div class = "new_acc">	
		<form  action = "upload_image.php" method="POST" enctype="multipart/form-data">	
			<input class="button" type="file" name="file">
			<button class="upload_btn" type="submit" name="upload" class="upload_image" >Post</button>
			<br>
			<p>or</p>
			<br>	
			<p><a href="photo_booth.php">Photo Booth</a></p>
		</form>
	</div>
</body>
</html>