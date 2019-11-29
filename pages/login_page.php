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
	<title>camagru</title>
</head>
<body>
	<div class = "form_data">	
		<form class = "login_acc" action="login_page.php" method="POST">
			<div class="header"><h1 styles = "align:center;">Camagru</h1></div>  
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
			<br />
			<div>
				<a class="pass" href="forgot_password_page.php">Forgot password?</a>
			</div>
			<p><a class="acc" href="../index.php">View Gallery</a></p>
		</form>
		<div class="new_acc">
			<p>Dont have an account: <a class="acc" href="sign_up_page.php">Sign up</a></p>
		</div>
	</div>
</body>
</html>