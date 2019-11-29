<?php
	include('utilities/includes.php');
	$username = $password = '';
	$login_errors = ['username' => '', 'password' => '', 'errors'=>''];

	if (isset($_POST['login'])){
		$username = htmlspecialchars($_POST['username']);
		$login_errors['username'] = verify_username($username);
		$password = htmlspecialchars($_POST['password']);
		$login_errors['password'] = verify_password($password, $password);
	}
	if (!array_filter($login_errors) && isset($_POST['login'])){
		#COLLECT DATA FROM DATBASE
		$sql = 'SELECT * FROM camagru_users WHERE username = :username';
		$stmt = $pdo->prepare($sql);
		$stmt->execute([':username' => $username]);
		$_SESSION['id'] = $id;
		$_SESSION['username'] = $username;
		while ($user = $stmt->fetch()){
			$id = $user['id'];
			$username = $user['username'];
			$h_password = $user['password'];
			$verified = $user['verified'];
			$_SESSION['id'] = $user['id'];
			$_SESSION['password'] = $user['password'];
			$_SESSION['name'] = $user['name'];
			$_SESSION['email'] = $user['email'];
			if (password_verify($password, $h_password) && $verified === 'Y'){
				header('Location: ../main/pages/home_page.php');
			} elseif ($verified === 'N') {
				$login_errors['errors'] = '<p text-align="center">Account not verified</p>';
			} elseif (!password_verify($password, $h_password))  {
				$login_errors['errors'] = 'You entered and invalid username or password, try again';
			}
		}
	}
?>