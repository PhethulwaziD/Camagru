<?php
	session_start();
	require_once('../../config/database.php');
	include('../../pages/utilities/includes.php');
	if ($_SESSION['id'] == null){
		header('Location: ../../index.php');
	}
	$id = $_SESSION['id'];
	$name = $_SESSION['name'];
	$username = $_SESSION['username'];
	$email = $_SESSION['email'];
	$errors = ['name' => '', 'username' => '', 'email' => ''];
	if (isset($_POST['Save'])){
		
		if ($_SESSION['username'] !== $_POST['username'] ){
			$new_username = htmlspecialchars($_POST['username']);
			$errors['username'] = verify_username($new_username);
			$stmt = $pdo->QUERY('SELECT * FROM camagru_users');
			while ($row = $stmt->fetch(PDO::FETCH_OBJ)){
				if (strtolower($row->username) === strtolower($new_username)){
					$errors['username'] = 'Sorry username already taken, please try another one';
				}
			}
		}
		if ($_SESSION['email'] !== $_POST['email']){
			$email = htmlspecialchars($_POST['email']);
			$errors['email'] = verify_email($email);
			$stmt = $pdo->QUERY('SELECT * FROM camagru_users');
			while ($row = $stmt->fetch(PDO::FETCH_OBJ)){
				if ($row->email === strtolower($email))
					$errors['email'] = 'Sorry email already taken, please try another one';
			}
		}
		if ($_SESSION['name'] !== $_POST['name'] ){
			$name = htmlspecialchars($_POST['name']);
			$errors['name'] = verify_name($name);
		}
		
		if (!array_filter($errors)){
			$sql = 'SELECT * FROM camagru_users WHERE id = :id';
			$stmt = $pdo->prepare($sql);
			$stmt->execute([':id' => $id]);
			while ($user = $stmt->fetch()){
				if ($user['name'] !== $name){
					$sql = 'UPDATE camagru_users SET name = :name WHERE id = :id';
					$stmt = $pdo->prepare($sql);
					$stmt->execute([':name' => $name,':id' => $id]);
					$_SESSION['name'] = $name;
				} elseif ($user['username'] !== $new_username){
					$sql = 'UPDATE camagru_users SET username = :username WHERE id = :id';
					$stmt = $pdo->prepare($sql);
					$stmt->execute([':username' => $new_username,':id' => $id]);
					$_SESSION['username'] = $new_username;
				} elseif ($user['email'] !== $email){
					$sql = 'UPDATE camagru_users SET email = :email WHERE id = :id';
					$stmt = $pdo->prepare($sql);
					$stmt->execute([':email' => $email,':id' => $id]);
					$_SESSION['email'] = $email;
				}
			}
		}
	}
?>