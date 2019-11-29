<?php
	session_start();
?>
<?php
	require_once('../config/database.php');
	#CHECK_ERRORS AND REGISTER USER
	#CONFIRM THE CODE
	#IF ITS CORRECT UPDATE verfified to Y
	$code_errors = ['code' => ''];
		if (empty($_GET['code'])){
			$code_errors['code'] = "Verification code required";
		} else {
			$verification_code = htmlspecialchars($_GET['code']);
		}
		if (!array_filter($code_errors)){
			$username =  htmlspecialchars($_GET['username']);
			$sql = 'SELECT * FROM camagru_users WHERE username = :username';
			$stmt = $pdo->prepare($sql);
			$stmt->execute([':username' => $username]);
			while ($user = $stmt->fetch()){
				$verification = $user['verification'];
				if ($verification_code === $verification){
					$verified = 'Y';
					$sql = 'UPDATE camagru_users SET verified = :verified WHERE username = :username';
					$stmt = $pdo->prepare($sql);
					$stmt->execute(['verified' => $verified,':username' => $username]);
					session_destroy();
				} else{
					$code_errors['code'] = 'Youre verfication code is invalid sucker';
				}
			}
		}

?>