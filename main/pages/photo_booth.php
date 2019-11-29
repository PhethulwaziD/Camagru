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
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, intiail-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../templates/styles.css">
	<title>camagru_home page</title>
	<title></title>
</head>
	<body>
	<nav>
		<ul>
			<li>
				<a href="home_page.php">Home</a>
			</li>
			<li>
				<a href="gallery_page.php">Gallery</a>
			</li>
			<li>
				<a href="profile_page.php">Profile</a>
			</li>
			<li>
				<a href="logout.php">Logout</a>
			</li>
		</ul>
	</nav>
	<p id ="response"></p>
	<section class="photo_booth">
			<div>
			<canvas id="cover" width="320" height="230"></canvas>
			<video id="video" width="320" height="250" autoplay></video>
			</div>
			<a class="button" href="#" id="capture">TAP</a>	
		<div class="filters">
            <img src="stickers/sad.png" id="sad" alt="sad" width="50" height="50">
            <img src="stickers/criminal.png" id="criminal" alt="criminal" width="50" height="50">
            <img src="stickers/face.png" id="face" alt="face" width="50" height="50">
            <img src="stickers/glasses.png" id="glasses" alt="glasses" width="50" height="50">
			<img src="stickers/cry.png" id="cry" alt="cry" width="50" height="50">
        </div>
		<?='<input type="file" id = "file-input" name= "file">'?>
		<div>
	   		<canvas id="canvas" width="320" height="230" style="display:none;"></canvas>
		</div>
			<a class="button" href="#" id="upload">UPLOAD</a>
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
	</section>
	<?php include_once('footer.php'); ?>
</body>
<script type="text/javascript" src="booth.js"></script>
</html>