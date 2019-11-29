<?php 
	include('valid_password.php');
	function verify_password($password, $pass){
		if ($password == null) {
			return ("Password required");
		} else {
			if (!valid_password($password)){
				return ("Invalid Password: must have 8 or more characters, with upper and lower cases");
			}else {
				if ($pass == null){
					return ("Confirmation password required");
				}else {
					
					if($pass !== $password){
						return ("password does not match");
					}
				}
			}
		}
		return (null);
	}
?>