<?php
	session_start();
	include_once('notification_preference.php');
	include('update_profile.php');
	require_once('../../config/database.php');
	if (!$_SESSION['id']){
		header('Location: ../../index.php');
	}
	if (isset($_POST['change_password'])){
		header('Location: change_password_page.php');
	}
?>
<!DOCTYPE html>
<html>
	<?php include_once('header.html'); ?>
	<div class="upcoming-container">
		<div class="upcoming-images">
			<div class = "profile_data">	
				<form class="create_acc" action="profile_page.php" method="POST">
					<div class="header"><h1><?php echo $username; ?></h1></div>
					<input type="text" name="name" placeholder="Full Name" value="<?php echo $name;?>">
					<div class = errors><?php echo $errors['name']?></div>
					<input type="text" name="username" placeholder="Username" value="<?php echo $username; ?>">
					<div class = errors><?php echo $errors['username']?></div>
					<input type="text" name="email" placeholder="Email" value="<?php echo $email; ?>">
					<div class = errors><?php echo $errors['email']?></div>
					<div class="notification">
					<div ><p class="note">Email notification</p></div>	
						<div >
							<input class= "notify" type="submit" name="ON" value="ON" >
						</div>
						<div>
							<input class= "notify" type="submit" name="OFF" value="OFF">
						</div>
					</div>
					<br />
					<br />
					<div class="button">
						<input type="submit" name="Save" value="Save Changes" class="btn">
					</div>
					<br />
					<div class="button">
						<input type="submit" name="change_password" value="Change Password" class="btn">
					</div>
				</form>
			</div>
		</div>
	</div>	
</body>
	<script type="text/javascript" src="script.js"></script>
</html>