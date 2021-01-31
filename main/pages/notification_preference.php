<?php
	session_start();
	require_once('../../config/database.php');
	if (!$_SESSION['id']){
		header('Location: ../../index.php');
	}
	$id = $_SESSION['id'];	
	if (isset($_POST['ON']) || isset($_POST['OFF'])) {
		$sql = 'SELECT * FROM camagru_users WHERE id = :id';
		$stmt = $pdo->prepare($sql);
		$stmt->execute([':id' => $id]);
		while ($user = $stmt->fetch()){
			$notification = $user['notification'];
			if ($_POST['ON']) {
				$sql = 'UPDATE camagru_users SET notification = :notification WHERE id = :id';
				$stmt = $pdo->prepare($sql);
				$stmt->execute(['notification' => 'ON',':id' => $id]);
				header("Location: profile_page.php");
			} elseif ($_POST['OFF']) {
				$sql = 'UPDATE camagru_users SET notification = :notification WHERE id = :id';
				$stmt = $pdo->prepare($sql);
				$stmt->execute(['notification' => 'OFF',':id' => $id]);
				header("Location: profile_page.php");
			}
		}
	}
 ?>