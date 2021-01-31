<?php
	session_start();
	#CONNECT TO DATABASE
	require_once('../config/database.php');
	include_once('login.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, intiail-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../templates/styles.css">
	<link rel="stylesheet" type="text/css" href="../main/templates/styles.css">
	<title>camagru_home page</title>
<body>
	<header class="showcase" id="index-header">
		<a href="" class="logo" id="index-logo">Camagru</a>
		<div id="index-toggle" class="menu-toggle">+</div>
		<nav>
			<ul>
				<li><a id="index-links" href="../index.php">Home</a></li>
				<li><a id="index-links" href="login_page.php">Sign In</a></li>
				<li><a id="index-links" href="pages/forgot_password_page.php">Forgot password</a></li>
				<!--<li><a id="index-links" href="forgot_password_page.php">Forgot password</a></li>-->
			</ul>
		</nav>
		<div class="clearfix"></div>
	</header>
	<div class="forgot_page">
		<div class = "form_data">	
			<form class = "login_acc" action="login_page.php" method="POST">
				<div class="header"><h1 styles = "align:center;">Sign In</h1></div>  
				<input type="text" name="username" placeholder="Username" value="<?php
				echo htmlspecialchars($username) ?>">
				<div class = errors><?php echo $login_errors['username']?></div>
				<input type="password" name="password" placeholder="password" value="<?php
				echo htmlspecialchars($password) ?>">
				<div class = errors><?php echo $login_errors['password']?></div>
				<div class="button">
					<input type="submit" name="login" value="login" class="btn">
				</div>
				<div class="login_errors"><?php echo $login_errors['errors']?></div>
			</form>
		</div>
	</div>
</body>
<script type="text/javascript" src="../main/pages/script.js"></script>
</html>