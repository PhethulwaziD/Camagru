<?php
	require_once('../config/database.php');
	include('utilities/password_reset.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, intiail-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../templates/styles.css">
	<title></title>
</head>
<body>
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
				<p><a class="acc" href="sign_up_page.php">Sign up</a></p>
				<div class="go_to_login"  onclick="location.href='index.php';"	>
					<p>Go back to: <a class="acc" href="login_page.php">Login</a></p>
				</div>
			</form>
		</div>
	</div>
</body>
</html>
