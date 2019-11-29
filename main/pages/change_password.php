<?php
	session_start();
	require_once('../../config/database.php');
	include('../../pages/utilities/includes.php');
	if ($_SESSION['id'] == null){
		header('Location: ../../index.php');
	}
	$errors = ['current_password' => '', 'password' => ''];
	if (isset($_POST['save'])){
		$id = $_SESSION['id'];
		$sql = 'SELECT * FROM camagru_users WHERE id = :id';
		$stmt = $pdo->prepare($sql);
		$stmt->execute([':id' => $id]);
		while ($user = $stmt->fetch()) {
			$current_password= $user['password'];	
			$password = htmlspecialchars($_POST['password']);
			$errors['current_password'] = verify_password($_POST['current_password'], $_POST['current_password']);
			if (!$errors['current_password']){
				if (!password_verify($_POST['current_password'], $current_password))
					$errors['current_password'] = "Incorrect password";
			}
			//validate form first
			$pass = htmlspecialchars($_POST['pass']);
			$errors['password'] = verify_password($password, $pass);
			if (!array_filter($errors) &&  !password_verify($password, $current_password)){	
				#hash the password
				$h_password = password_hash($password, PASSWORD_DEFAULT);
				#update password in server to new server
				$sql = 'UPDATE camagru_users SET password = :password WHERE id = :id';
				$stmt = $pdo->prepare($sql);
				$stmt->execute(['password' => $h_password,':id' => $id]);
				unset($_SESSION['password']);
				$_SESSION['password'] = htmlspecialchars($_POST['password']);
				header('Location: profile_page.php');
			}
		}
	}
?>