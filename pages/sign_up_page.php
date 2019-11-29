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
	<title>camagru</title>
</head>
<body>
	<div class = "form_data">	
		<form class = "create_acc" action="sign_up_page.php" method="POST">
			<div class="header"><h1>Camagru</h1></div>
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
			<input type="password" name="pass" placeholder="Confirm password" >
			<div class="button">
				<input type="submit" name="sign_up" value="Sign up" class="btn">
			</div>
			<p><a class="acc" href="../index.php">View Gallery</a></p>
		</form>
		<div class="login">
			<p>Have an account: <a class="acc" href="login_page.php">Login</a></p>
		</div>
	</div>
</body>
</html>
