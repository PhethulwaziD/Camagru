<?php
	function verify_username($username){
		if ($username == null) {
			return ("Username required");
		} else {
			if (!preg_match('/^[a-zA-Z0-9]/', $username) || strlen($username) < 5){
				return ("Invalid Username:must be 5 or more characters long");
			}	
		}
		return (null);
	}
?>