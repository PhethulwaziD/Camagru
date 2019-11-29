<?php
	session_start();
?>
<?php
	require_once('../config/database.php');
	#CHECK_ERRORS AND REGISTER USER
	include_once('sign_up_errors.php');
	include_once('confirm.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, intiail-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../templates/styles.css">
	<link rel="stylesheet" type="text/css" href="../main/templates/styles.css">
	<title>camagru_home page</title>
	<title></title>
</head>
<body>
	<header>
		Camagru
	</header>
	<nav>
		<ul>
			<li>
				<a href="login_page.php">Login</a>
			</li>
			<li>
				<a href="sign_up_page.php">Sign up</a>
			</li>
		</ul>
	</nav>
	<div class="confirm">
		<div class="header"><h1>Verification</h1></div>
		<div class="confirm_email">
			<?php 
				if (!array_filter($code_errors))
					echo "Account Verified";
			?>
		</div>
		<div class = errors><?php echo $code_errors['code']?></div>
	</div>
</body>
</html>