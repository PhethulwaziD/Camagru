<?php
	session_start();
?>
<?php
	require_once('../config/database.php');
	#CHECK_ERRORS AND REGISTER USER
	include_once('confirm.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, intiail-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../templates/styles.css">
	<link rel="stylesheet" type="text/css" href="../main/templates/styles.css">
	<link rel="stylesheet" type="text/css" href="main/templates/styles.css">
	<title>camagru_home page</title>
	<body>
		<header class="showcase" id="index-header">
			<a href="" class="logo" id="index-logo">Camagru</a>
			<div id="index-toggle" class="menu-toggle">+</div>
			<nav>
				<ul>
					<li><a id="index-links" href="index.php">Home</a></li>
					<li><a id="index-links" href="pages/sign_up_page.php">Sign Up</a></li>
					<li><a id="index-links" href="pages/login_page.php">Sign In</a></li>
					<li><a id="index-links" href="pages/forgot_password_page.php">Forgot password</a></li>
				</ul>
			</nav>
			<div class="clearfix"></div>
		</header>
		<div class="confirm">
			<div class="header"><h1>Verification</h1></div>
			<div class="confirm_email">
				<?php 
					if (!array_filter($code_errors))
						echo "Account Verified"
				?>
			</div>
			<div class = errors><?php echo $code_errors['code']?></div>
		</div>
	</body>
	<script type="text/javascript" src="../main/pages/script.js"></script>
</html>