<?php
	include('utilities/includes.php');

	#FORM VALIDATION
	$name = $username = $email = $password = $pass = '';
	$errors = ['name' => '', 'username' => '', 'email' => '', 'password' => ''];
	if (isset($_POST['sign_up'])){
		//Full name
		$name = htmlspecialchars($_POST['name']);
		$errors['name'] = verify_name($name);
		//username
		$username = htmlspecialchars($_POST['username']);
		$errors['username'] = verify_username($username);
		//email
		$email = htmlspecialchars($_POST['email']);
		$errors['email'] = verify_email($email);
		//password
		$password = htmlspecialchars($_POST['password']);
		$pass = htmlspecialchars($_POST['pass']);
		$errors['password'] = verify_password($password, $pass);
	}
?>