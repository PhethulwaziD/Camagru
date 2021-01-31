<?php
	#CONNECT TO DATABASE
	include_once('../config/database.php');
	#CHECK_ERRORS AND REGISTER USER
	include_once('sign_up_errors.php');
	#CHECK_ERRORS AGAIN AND REGISTER USER
	include_once('sign_up.php');
	session_start();
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
			<form class = "create_acc" action="sign_up_page.php" method="POST">
				<div class="header"><h1>Sign Up</h1></div>
				<input type="text" name="name" placeholder="Full Name" value="<?php echo 
				htmlspecialchars($name) ?>">
				<div class = errors><?php echo $errors['name']?></div>
				<input type="text" name="username" placeholder="Username" value="<?php echo
				htmlspecialchars($username) ?>">
				<div class = errors><?php echo $errors['username']?></div>
				<input type="text" name="email" placeholder="Email" value="<?php echo 
				htmlspecialchars($email) ?>">
				<div class = errors><?php echo $errors['email']?></div>
				<input type="password" name="password" placeholder="password">
				<div class = errors><?php echo $errors['password']?></div>
				<div class = errors><?php echo $err ?></div>
				<input type="password" name="pass" placeholder="Confirm password" >
				<div class="button">
					<input type="submit" name="sign_up" value="Sign up" class="btn">
				</div>
			</form>
		</div>
	</div>
</body>
<script type="text/javascript" src="../main/pages/script.js"></script>
</html>
