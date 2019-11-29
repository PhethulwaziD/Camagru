<?php
	function verify_login($username, $password){
		if ($username == null){
			return ("Username required");
		}
		elseif ($password == null){
			return ("Password required");
		}
		return (null);
	}
?>