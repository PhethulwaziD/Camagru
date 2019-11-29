<?php
	#CONNECT DATABASE
	session_start();
	include_once('../config/database.php');
	#CHECK_ERRORS AND REGISTER USER
	include_once('sign_errors.php');
	#CHECK_ERRORS AGAIN AND REGISTER USER
	//EXISTING USER
	include_once('existing_user.php');

	#HASH PASSWORD
	$h_password = password_hash($password, PASSWORD_DEFAULT);
	#CREATE A VERIFICATION KEY
	$verification_key = "abcdefghijklmnopqsrtuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
	$verification = substr(str_shuffle($verification_key),0,6);
	if (!array_filter($errors) && isset($_POST['sign_up'])){
		try {
			$_SESSION['username'] = $username;
			$sql = 'INSERT INTO camagru_users(name, username, email, password, verification, verified, notification) VALUES(:name, :username, :email, :password, :verification, :verified, :notification)';
			$stm = $pdo->prepare($sql);

			if($stm->execute(['name'=>$name, 'username'=>$username, 'email'=>$email, 'password'=>$h_password, 'verification'=>$verification, 'verified'=>'N', 'notification' => 'ON'])) {
				$confirmation_link = "http://127.0.0.1:8080/camagru/pages/confirmation_page.php?username=".$username."&code=".$verification;
				$to = $email;
				$subject = 'Email Confirmation';
				$message = '<h3>Hi '.$username. "</h3>Thank you for joining Camagru. Click link to verfiy email: ".$confirmation_link;
				$headers = 'From: The sender Name <pdonga@student.wethinkcode.co.za>\r\n';
				$headers .= 'Reply-To pdonga@student.wethinkcode.co.za\r\n';
				$headers .= 'Content-type: text/html\r\n';
				if (mail($to, $subject, $message, $headers)){
					header('Location: success.php');
				}
			}
		}
		catch (PDOException $e){
			echo "eishh an error occured;".$e->getMessage();
		}
	}
?>