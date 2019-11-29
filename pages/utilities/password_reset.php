<?php
	include ('includes.php');
	$email = '';
	$email_errors = ['email' => ''];
	if (isset($_POST['send'])){
		#VALIDATE FORM DATA
		$email = htmlspecialchars($_POST['email']);
		$email_errors['email'] = verify_email($email);
		if (!array_filter($email_errors)){
			#FIND USER
			$sql = 'SELECT * FROM camagru_users WHERE email = :email';
			$stmt = $pdo->prepare($sql);
			$stmt->execute([':email' => $email]);
			while ($user = $stmt->fetch()){
				$user_email = $user['email'];
				$username = $user['username'];
				#FIND USER
				if ($user_email === $email){
					#CREATE A NEW PASSWORD
					#hash the password
					$new_password = create_password();
					$h_password = password_hash($new_password, PASSWORD_DEFAULT);
					#update password in server to new server
					$sql = 'UPDATE camagru_users SET password = :password WHERE email = :email';
					$stmt = $pdo->prepare($sql);
					$stmt->execute(['password' => $h_password,':email' => $email]);
					#send an email of the new password
					$to = $email;
					$subject = 'New Password';
					$message = '<h3>Hi '.$username. "</h3>Here is your new password: ".$new_password;
					$headers = 'From: The sender Name <pdonga@student.wethinkcode.co.za>\r\n';
					$headers .= 'Reply-To pdonga@student.wethinkcode.co.za\r\n';
					$headers .= 'Content-type: text/html\r\n';
					if (mail($to, $subject, $message, $headers)){
						header('Location: login_page.php');
					}
				}
			}
		}
	} 
?>