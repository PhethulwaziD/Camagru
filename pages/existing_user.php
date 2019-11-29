<?php
	require_once('../config/database.php');
	$stmt = $pdo->QUERY('SELECT * FROM camagru_users');
	while ($row = $stmt->fetch(PDO::FETCH_OBJ)){
		if (strtolower($row->email) === strtolower($email))
			$errors['email'] = 'Sorry email already taken, please try another one';
		else if (strtolower($row->username) === strtolower($username)){
			$errors['username'] = 'Sorry username already taken, please try another one';
		}
	}
?>