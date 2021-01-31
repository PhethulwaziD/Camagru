<?php
	require_once('../../config/database.php');
	session_start();
	include('change_password.php');
	if ($_SESSION['id'] == null){
		header('Location: ../../index.php');
	}
?>
<!DOCTYPE html>
<html>
<?php include_once('header.html'); ?>
<div class="upcoming-container">
	<div class="upcoming-images">
		<div class = "profile_data">	
			<form class ="create_acc" action="change_password_page.php" method="POST">
				<div class="header"><h1>Password</h1></div>
				<input type="password" name="current_password" placeholder="Current password">
				<div class = errors><?php echo $errors['current_password']?></div>
				<input type="password" name="password" placeholder="New password">
				<div class = errors><?php echo $errors['password']?></div>
				<input type="password" name="pass" placeholder="Confirm password" >
				<br />
				<br />
				<div class="button">
					<input type="submit" name="save" value="Save changes" class="btn">
				</div>
				<p><a class="acc" href="profile_page.php">Back</a></p>
			</form>
	</div>
</div>

</div>
</body>
<script type="text/javascript" src="script.js"></script>
</html>