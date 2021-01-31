<?php
	require_once('../../config/database.php');
	include_once('upload.php');
	session_start();
	if ($_SESSION['id'] == null){
		header('Location: ../../pages/login_page.php');
	}
	$username = $_SESSION['username'];
?>	
<!DOCTYPE html>
<html>
	<?php include_once('header.html'); ?>
	<div class="upcoming-container">
		<div class="upcoming-images booth">
			<div class="video-wrapper">
				<div class="description">
					<?='<input type="file" id = "file-input" name= "file">'?>
					<?php 
						if ($image)
							echo $image;
					?>
					<div class="desc-content">
						<div>
							<a class="button" id="capture"></a>	
							<video id="video" width="320" height="250" autoplay></video>
						</div>
					</div>
				</div>
			</div>
			<div class="picture">
				<div class="description">		
					<div class="filters">
						<img src="stickers/sad.png" id="sad" alt="sad" width="50" height="50">
						<img src="stickers/criminal.png" id="criminal" alt="criminal" width="50" height="50">
						<img src="stickers/face.png" id="face" alt="face" width="50" height="50">
						<img src="stickers/glasses.png" id="glasses" alt="glasses" width="50" height="50">
						<img src="stickers/cry.png" id="cry" alt="cry" width="50" height="50">
					</div>
					<div class="canvases" >
						<canvas id="cover" width="320" height="230"></canvas>
						<canvas id="canvas" width="320" height="230" onload="drawImage()"></canvas>
						<a	 class="button" id="upload">UPLOAD</a>
					</div>
					<div class="thumbnail" >
						<?php 
							$sql = 'SELECT * FROM gallery ORDER BY id DESC LIMIT 4';
							$stmt = $pdo->prepare($sql);
							$stmt->execute();
							while ($pics = $stmt->fetch()) { 
								if (strstr($pics['directory'], $username)){?>
						
								<a href="comments_page.php?id=<?php echo $pics['id']; ?>">
									<img src="<?php echo "uploads/".$pics['directory']; ?>" width="80" height="80">
								</a>
						<?php } }?>
					</div>
				</div>
			</div>			
		</div>
	</div>
	<?php include_once('footer.php'); ?>
</body>
<script type="text/javascript" src="booth.js"></script>
<script type="text/javascript" src="script.js"></script>
</html>