<?php 
	function verify_name($name){
		if ($name == null){
			return ("Full name required");
		} else {
			if (!preg_match('/^[a-zA-Z\s]+$/', $name) || strlen($name) < 6){
				return ("Invalid Full Name");
			}
		}
		return (null);
	}
?>