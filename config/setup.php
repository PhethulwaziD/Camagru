<?php
	$db_name = "camagru";
	$db_sever = "mysql:host=localhost; dbname=".$db_name;
	$db_host_ = "mysql:host=localhost";
	$db_user = "root";
	$db_password = "";
	try {
		$db = new PDO($db_host_, $db_user, $db_password);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "DROP DATABASE `".$db_name."`";
		$db->exec($sql);
	} catch (PDOException $e) {
		echo "ERROR DROPPING DB".$e->getMessage();
	}
	// CREATE CAMAGRU DATABASE
	try {
		// Connect to Mysql server
		$db = new PDO($db_host_, $db_user, $db_password);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "CREATE DATABASE `".$db_name."`";
		$db->exec($sql);
	} catch (PDOException $e) {
		echo "Could not create database ".$e->getMessage();
		exit(-1);
	}
	// CREATE TABLE FOR USERS
	try {
		$db = new PDO($db_sever, $db_user, $db_password);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "CREATE TABLE camagru_users(
	 	id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL, 
	 	name VARCHAR(255) NOT NULL, 
	 	username VARCHAR(255) NOT NULL, 
	 	email VARCHAR(255) NOT NULL, 
	 	password VARCHAR(255) NOT NULL, 
	 	verification VARCHAR(255) NOT NULL, 
	 	verified VARCHAR(1) DEFAULT 'N' NOT NULL,
	 	notification VARCHAR(3) DEFAULT 'ON' NOT NULL)";
		$db->exec($sql);
	} catch (PDOException $e) {
		echo "Could not create table".$e->getMessage();
	}
	try {
		$db = new PDO($db_sever, $db_user, $db_password);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "CREATE TABLE gallery(
		id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
		userid INT(11) UNSIGNED NOT NULL,  
		username VARCHAR(255) NOT NULL, 
		directory VARCHAR(255) NOT NULL,
		comments INT(11) DEFAULT 0,
		likes INT(11) DEFAULT 0)";
		$db->exec($sql);
	} catch (PDOException $e) {
		echo "Could not create table gallery".$e->getMessage();
	}
	try {
		$db = new PDO($db_sever, $db_user, $db_password);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "CREATE TABLE comments(
		id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
		imageid INT(11) UNSIGNED NOT NULL,  
		username VARCHAR(255) NOT NULL,
		comment LONGBLOB NOT NULL)";
		$db->exec($sql);
	} catch (PDOException $e) {
		echo "Could not create table comments".$e->getMessage();
	}
	try {
		$db = new PDO($db_sever, $db_user, $db_password);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "CREATE TABLE likes(
			id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
			imageid INT(11) UNSIGNED NOT NULL,  
			username VARCHAR(255) NOT NULL)";
			$db->exec($sql);
			header('Location: ../index.php');
	} catch (PDOException $e) {
		echo "Could not create table likes".$e->getMessage();
	}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, intiail-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../templates/styles.css">
	<title>camagru</title>
</head>
<body>
		<div class="header"><h1>Camagru</h1></div>
</body>
</html>