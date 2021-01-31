<?php
	require_once('../config/database.php');
	include('utilities/password_reset.php');
?>
<!DOCTYPE html>
<html>
<head>
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
				<li><a id="index-links" href="sign_up_page.php">Sign Up</a></li>
				<li><a id="index-links" href="login_page.php">Sign In</a></li>
				<!--<li><a id="index-links" href="forgot_password_page.php">Forgot password</a></li>-->
			</ul>
		</nav>
		<div class="clearfix"></div>
	</header>
	<div class="forgot_page">
		<form class="forgot" action="forgot_password_page.php" method="POST">
			<h1>Locked out?</h1>
			<div class="email_link">
				Enter your email address and we'll send you a new password.
			</div>
			<input type="text" name="email" placeholder="Email"value="<?php echo 
			htmlspecialchars($email) ?>">
			<div class = errors><?php echo $email_errors['email']?></div>
			<div class="button">
				<input type="submit" name="send" value="send" class="btn">
			</div>
			</form>
		</div>
	</div>
</body>
<script type="text/javascript" src="../main/pages/script.js"></script>
</html>
